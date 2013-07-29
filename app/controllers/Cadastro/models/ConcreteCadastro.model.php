<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteCadastro
 *
 * Esta classe extende a Cadastro sendo responsavel
 * por todas as requisicoes a tabela Cadastro da base de dados.
 * 
 * @package app\controllers\Cadastro\models\ConcreteCadastro
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteCadastro extends Cadastro
{
    /**
     * Metodo ConfiguraEmail
     *
     * Metodo responsavel por estanciar todos os parametros necessarios para o envio de 
     * email e armazenar o resultado na variavel $MailHelper utilizada no metodo MandaEmailAdmin()
     * e MandaEmailUsuario().
     * 
     * @return object
     */
    private function ConfiguraEmail(mailHelper $MailHelper)
    {
        //Dados do SMTP
        $MailHelper->setIsSMTP();
        $MailHelper->setPort(587);
        $MailHelper->setMailer('smtp');
        $MailHelper->setHost(EMAIL_HOST);
        $MailHelper->setSMTPAuth(true);
        $MailHelper->setUserName(USERNAME_HOST);
        $MailHelper->setPassword(PASSWORD_HOST);
        $MailHelper->setFromName('Demo Admin'); //$dados_website[0]['txt_default_title']
        $MailHelper->setFrom(USERNAME_HOST);
        $MailHelper->setIdioma('br', 'phpMailer/language/');
        $MailHelper->setWrap(50);
        $MailHelper->setIsHtml(true);

        //Retorna o objeto Mail
        return $MailHelper;
    }

    /**
     * Metodo buscaCidades
     *
     * O metodo buscaCidades recebe o codigo do estado enviado por paametro e direciona
     * a requisicao para a tabela CepCidades armazenando o resultado na variavel $TabelaCidades.
     * Logo abaixo chama o metodo getcidades e armazenando na variavel  $recordset  
     * 
     * @param string $parametros 
     * 
     * @return boolean
     */
    public function buscaCidades($parametros)
    {
    	//Inclui a biblioteca do JSON
    	LibFactory::getInstance(null, null, 'Zend/Json.php');
            
        //Busco o endereço pelo CEP
        $dados = TableFactory::getInstance('CepCidades')->getCidades($parametros['data']['cod_uf']);

        //Verifica se a requisição esta sendo feita via JSON
        if(isset($parametros['json_data']))
        {
            //Resposta do JSON
            echo Zend_Json::encode($dados);
        }
        else
        {
            //Caso contrário então apenas retorna o resultado da consulta
            return $recordset;
        }
    }

    /**
     * Metodo getEstados
     *
     * Retorna os dados dos Contatos direcionando para a tabela CepUf chamando o metodo
     * getEstados.
     * 
     */
    public function getEstados()
    {
        //Retorna os dados dos Contatoss
        return TableFactory::getInstance('CepUf')->getEstados();
    }

    /**
     * Metodo carregaEndereco
     *
     * Carrega os endrerecos de acordo com os parametros informados.
     * Instancia a tabela de ruas direcionando para a tabela CepRuas e armazenando 
     * na variavel  $TabelaRuas. Apos busca o cep da rua chamando o metodo SelectCep
     * dentro da variavel $TabelaRuas e armazenando na variavel $recordset. 
     * 
     * @param string $parametros 
     * 
     */
    public function carregaEndereco($parametros)
    {
    	//Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');
        
        //Busco o endereço pelo CEP
        $dados = TableFactory::getInstance('CepRuas')->SelectCep(str_replace("-", "", $parametros['txt_cep']));

        //Verifica se houve resultado
        if($dados !== false)
        {
            //Resposta do JSON
            echo Zend_Json::encode(array($dados['txt_rua'],
            	$dados['CepBairros']['txt_bairro'],
            	$dados['CepBairros']['CepCidades']['cod_id'],
            	$dados['CepBairros']['CepCidades']['CepUf']['cod_id']));
        }
        else
        {
            //Não houve resultado, é enviado um array vazio
            echo Zend_Json::encode(array());
        }
    }

    /**
     * Metodo cadastrar
     *
     * O metodo cadastrar cadastra os dados passados por parametro enviando para a tabela
     * Cadastro e chamando o metodo ExecuteCadastrar passando os parametros a serem cadastrados.
     * 
     * @param string[] $parametros
     */
    public function cadastrar($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o Helper Principal
        $Helper = HelperFactory::getInstance();

        //Instancia a Classe de Validação do Formulário
        $ComponenteValidacao = getComponent('validacoes/validacao_cadastro', 'ValidacaoCadastro');

        //Executa a validacao
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validação
        if(count($resultado_validacao) == 0)
        {
            //Formata o campo data antes de gravar no banco de dados
            $parametros['dat_nascimento'] = $Helper->FormataData($parametros['dat_nascimento'], 'usa');
            $parametros['dat_cadastro'] = date("Y-m-d H:i:s");

            //Arruma a codificação mantendo os acentos
        	$parametros = $Helper->TrataValor($parametros, null, null, null, true);
        
        	//instancia as mensagens
        	$mensagem = TableFactory::getInstance('TextosLayout')->getLayoutTexts();
        	
        	//Cadastra os dados no banco
            if(parent::ExecuteCadastrar($parametros) === true)
            {
	            //chama metodo que manda mail para o usuaário
	            $this->MandaEmailUsuario($parametros);
	            
	            //Manda email para o administrador
	            $this->MandaEmailAdmin($parametros);
	            
	            //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[23], 'sucesso' => true);
	            
	            //Envia sinal de sucesso ao JSON
           		echo Zend_Json::encode(array('1'));
            }
            else
            {
            	//Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[24], 'erro' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));	
            }
        }
        else
        {
            //Envia os erros ao JSON
            echo Zend_Json::encode($resultado_validacao);
        }
    }

    /**
     * Metodo Captcha
     *
     * O metodo Captcha instancia o captcha e armazena na variavel $helper.
     * Apos passa os parametros necessarios para o metodo CreateCaptcha
     *
     * @return string[]
     */
    public function Captcha()
    {
        $helper = HelperFactory::getInstance('captcha');

        //informa(Imagem de fundo do captcha, a fonte que será usada, toral caracteres, tamanho da fonte, angulo)
        $helper->CreateCaptcha(DEFAULT_CAPTCHA_IMAGE, DEFAULT_CAPTCHA_FONT, 6, 20, 10);
    }

    /**
     * Metodo MandaEmailUsuario
     * 
     * Envia um Email para o usuario
     * 
     * @param string[] $parametros
     * 
     * @return object 
     */
    public function MandaEmailUsuario($parametros)
    {
        //Instancia o Helper Principal
        $Helper = HelperFactory::getInstance();
        //Instancia o Helper Mail
        $MailHelper = HelperFactory::getInstance('mail');
        //Configura o Helper Mail
        $MailHelper = $this->ConfiguraEmail($MailHelper);

        //Monta o corpo do Email
        $mail_body = '<font face="Arial, Helvetica, sans-serif" color="#000000" size="2"><b>Confirmação de envio de formulário pelo Website - Cadastre-se</b><br/><br/>';

        $time = mktime(date('H') - 3, date('i'), date('s'));
        $hora = gmdate("H:i:s", $time);
        $data = date('d/m/Y');

        $mail_body .= "Enviado em  $data - às $hora.<br/><br/>";
        $mail_body .= "Agradecemos seu cadastro. Abaixo os dados enviados por você:<br/><br/>";
        $mail_body .= "<b>Nome:</b> " . $parametros['txt_nome'] . "<br/>";
        $mail_body .= "<b>Profissão:</b> " . $parametros['txt_profissao'] . "<br/>";
        $mail_body .= "<b>Data de nascimento:</b> " . $Helper->FormataData($parametros['dat_nascimento'], 'br') . "<br/>";
        $mail_body .= "<b>Sexo:</b> " . ($parametros['cha_sexo'] == 'M' ? 'Masculino' : 'Feminino') . "<br/>";
        $mail_body .= "<b>Endereço:</b> " . $parametros['txt_endereco'] . "<br/>";
        $mail_body .= "<b>Bairro:</b> " . $parametros['txt_bairro'] . "<br/>";
        $mail_body .= "<b>CEP:</b> " . $parametros['txt_cep'] . "<br/>";
        $mail_body .= "<b>Cidade:</b> " . $parametros['txt_cidade'] . "<br/>";
        $mail_body .= "<b>Estado:</b> " . $parametros['cha_estado'] . "<br/>";
        $mail_body .= "<b>Telefone:</b> " . $parametros['txt_telefone'] . "<br/>";
        $mail_body .= "<b>E-mail:</b> " . $parametros['txt_email'] . "<br/>";
        $mail_body .= "<b>Quero receber newsletter ?</b> " . ($parametros['chk_newsletter'] == 'S' ? 'Sim' : 'Não') . "<br/>";
        $mail_body .= "<b>Procedimento de seu interesse:</b> " . $parametros['txt_comentario'] . "<br/></font>";

        //Seta o corpo do E-mail
        $MailHelper->setBody($mail_body);

        //Seta o Email
        $MailHelper->setAddress($parametros['txt_email']);

        //Seta o assunto do E-mail
        $MailHelper->setSubject('Confirmação de envio de formulário pelo Website - Cadastre-se');

        //Envia o E-mail
        return $MailHelper->sendEmail();
    }

    /**
     * Metodo MandaEmailAdmin
     * 
     * Envia um Email para o admin
     * 
     * @param string[] $parametros
     * 
     * @return object 
     */
    public function MandaEmailAdmin($parametros)
    {    
        //Instancia o Helper Principal
        $Helper = HelperFactory::getInstance();
        //Instancia o Helper Mail
        $MailHelper = HelperFactory::getInstance('mail');
        //Configura o Helper Mail
        $MailHelper = $this->ConfiguraEmail($MailHelper);

        //Monta o corpo do Email
        $time = mktime(date('H') - 3, date('i'), date('s'));
        $hora = gmdate("H:i:s", $time);
        $data = date('d/m/Y');

        //Corpo da mensagem
        $mail_body = '<font face="Arial, Helvetica, sans-serif" color="#000000" size="2"><b>Novo formulário recebido no Website - Cadastre-se</b><br/><br/>';
        $mail_body.= "Enviado em  " . $data . " - às " . $hora . ".<br/><br/>";

        $mail_body .= "<b>Nome:</b> " . $parametros['txt_nome'] . "<br/>";
        $mail_body .= "<b>Profissão:</b> " . $parametros['txt_profissao'] . "<br/>";
        $mail_body .= "<b>Data de nascimento:</b> " . $Helper->FormataData($parametros['dat_nascimento'], 'br') . "<br/>";
        $mail_body .= "<b>Sexo:</b> " . ($parametros['cha_sexo'] == 'M' ? 'Masculino' : 'Feminino') . "<br/>";
        $mail_body .= "<b>Endereço:</b> " . $parametros['txt_endereco'] . "<br/>";
        $mail_body .= "<b>Bairro:</b> " . $parametros['txt_bairro'] . "<br/>";
        $mail_body .= "<b>CEP:</b> " . $parametros['txt_cep'] . "<br/>";
        $mail_body .= "<b>Cidade:</b> " . $parametros['txt_cidade'] . "<br/>";
        $mail_body .= "<b>Estado:</b> " . $parametros['cha_estado'] . "<br/>";
        $mail_body .= "<b>Telefone:</b> " . $parametros['txt_telefone'] . "<br/>";
        $mail_body .= "<b>E-mail:</b> " . $parametros['txt_email'] . "<br/>";
        $mail_body .= "<b>Quero receber newsletter ?</b> " . ($parametros['chk_newsletter'] == 'S' ? 'Sim' : 'Não') . "<br/>";
        $mail_body .= "<b>Procedimento de seu interesse:</b> " . $parametros['txt_comentario'] . "<br/></font>";

        //Instancia a tabela de contatos
        $TabelaEmailsFormularios = TableFactory::getInstance('EmailsFormularios');

        //Dados da tabela contatos
        $dados_tabela_EmailsFormularios = $TabelaEmailsFormularios->BuscaDados('1');

        //Seta o Email
        $MailHelper->setAddress($dados_tabela_EmailsFormularios['txt_email']);

        //Seta o corpo do E-mail
        $MailHelper->setBody($mail_body);

        //Seta o assunto do E-mail
        $MailHelper->setSubject('Novo formulário recebido no Website - Cadastre-se');

        return $MailHelper->sendEmail();
    }

}