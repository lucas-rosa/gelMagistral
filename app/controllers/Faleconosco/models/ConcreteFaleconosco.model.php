<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteFaleconosco
 *
 * Esta classe e responsavel por todas as requisicoes a tabela 
 * Faleconosco da base de dados.
 * 
 * @package app\controllers\Faleconosco\models\ConcreteFaleconosco
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteFaleconosco
{
    /**
     * Metodo ConfiguraEmail
     *
     * Metodo responsavel por estanciar todos os parametros necessarios para o envio de 
     * email e armazenar o resultado na variavel $MailHelper utilizada no metodo MandaEmailAdmin()
     * e MandaEmailUsuario().
     *
     * 
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
        $MailHelper->setFromName("LINEA");
        $MailHelper->setFrom('teste@lineacom.com.br');
        $MailHelper->setSubject('Confirmação de envio de formulário via website (Fale Conosco) - LINEA');
        $MailHelper->setIdioma('br', 'phpMailer/language/');
        $MailHelper->setWrap(50);
        $MailHelper->setIsHtml(true);

        //Retorna o objeto Mail
        return $MailHelper;
    }
    
    /**
     * Metodo SelectContatos
     * 
     * Este metodo seleciona todos os contatos cadastrados ate o momento.
     * Chama a tabela Contatos e o metodo SelectContatos.
     * 
     * @return string[]
     */
    public function SelectContatos()
    {
        return TableFactory::getInstance('Contatos')->SelectContatos();
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
        //Instancia o Helper Mail           
        $MailHelper = HelperFactory::getInstance('mail');

        //Configura o Helper Mail
        $MailHelper = $this->ConfiguraEmail($MailHelper);

        //Corpo do e-mail para o remetente do formulário
        $mail_body = "<font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#1A1A1A'>Confirmamos o recebimento de seu contato pelo website. Em breve estaremos enviando a resposta.<br /><br />";

        $mail_body .= "<b>Nome:</b> " . $parametros['txt_nome'] . "<br />";
        $mail_body .= "<b>E-mail:</b> " . $parametros['txt_email'] . "<br />";
        $mail_body .= "<b>Telefone:</b> " . $parametros['txt_telefone'] . "<br />";
        $mail_body .= "<b>Assunto:</b> " . $parametros['txt_assunto'] . "<br />";
        $mail_body .= "<b>Mensagem:</b> " . $parametros['txt_mensagem'] . "<br /><br />";

        $mail_body .= "<b>Att.,</b><br />";
        $mail_body .= "<b>LINEA</b><br />";
        $mail_body .= "<a href='http://www.lineacom.com.br'>www.lineacom.com.br</a></font>";

        //Seta o corpo do E-mail
        $MailHelper->setBody($mail_body);

        //Seta o Email
        $MailHelper->setAddress($parametros['txt_email']);

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
        //Instancia o Helper Mail           
        $MailHelper = HelperFactory::getInstance('mail');

        //Configura o Helper Mail
        $MailHelper = $this->ConfiguraEmail($MailHelper);

        //Corpo do e-mail para o cliente
        $mail_body = "<font face='Verdana, Arial, Helvetica, sans-serif' size='2' color='#1A1A1A'>Novo formulário de contato recebido pelo website:<br /><br />";
        $mail_body .= "<b>Nome:</b> " . $parametros['txt_nome'] . "<br />";
        $mail_body .= "<b>E-mail:</b> " . $parametros['txt_email'] . "<br />";
        $mail_body .= "<b>Telefone:</b> " . $parametros['txt_telefone'] . "<br />";
        $mail_body .= "<b>Assunto:</b> " . $parametros['txt_assunto'] . "<br />";
        $mail_body .= "<b>Mensagem:</b> " . $parametros['txt_mensagem'] . "<br /><br />";

        //Seta o corpo do E-mail
        $MailHelper->setBody($mail_body);

        //Dados da tabela contatos
        $dados_tabela_EmailsFormularios = $TabelaEmailsFormularios->BuscaDados('1');
        //Seta o Email
        $MailHelper->setAddress($dados_tabela_EmailsFormularios['txt_email']);

        return $MailHelper->sendEmail();
    }
    
    /**
     * InsertFaleconosco
     *
     * O metodo InsertFaleconosco cadastra os dados passados por parametro enviando para a tabela
     * Faleconosco e chamando o metodo incluirFaleConosco passando os parametros a serem cadastrados.
     * 
     * @param string[] $parametros
     */
    public function InsertFaleconosco($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instanciamos o componente de validação
        $ComponenteValidacao = getComponent('validacoes/faleconosco.validacao', 'FaleconoscoValidacao');

        //Executamos a validação dos dados
        $resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros);

        //Verifica o resultado da validacao
        if (count($resultado_validacao) == 0)
        {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            $mensagem = TableFactory::getInstance('TextosLayout')->getLayoutTexts();

            //Inclui o registro no banco de dados
            if (TableFactory::getInstance('FaleConosco')->incluirFaleConosco($parametros) === true)
            {
                //chama metodo que manda mail para o usuaário
                $this->MandaEmailUsuario($parametros);

                //Manda email para o administrador
                $this->MandaEmailAdmin($parametros);

                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[23], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
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
            //Retorna os erros da validação
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
    public function Captcha() {
        $helper = HelperFactory::getInstance('captcha');

        //informa(Imagem de fundo do captcha, a fonte que será usada, toral caracteres, tamanho da fonte, angulo)
        $helper->CreateCaptcha(DEFAULT_CAPTCHA_IMAGE, DEFAULT_CAPTCHA_FONT, 6, 30, 0);
    }

}

?>