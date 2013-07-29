<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteContatos
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Contatos da base de dados.
 * 
 * @package admin\app\controllers\Contatos\models\ConcreteContatos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteContatos
{
    /**
     * Metodo SelectConfiguracoes
     * 
     * Retorna todos os dados cadastrados ate o momento na tabela Contatos.
     * Faz uma requisicao a tabela Contatos chamando o metodo SelectContatosIdDetalhes passando o cod_relacao_idioma por 
     * parametro
     *  
     * @param string $parametros
     * 
     * @return string[]
     * 
     */
    public function SelectContatosDetalhes($parametros)
    {
        //Retorna os dados
        return TableFactory::getInstance('Contatos')->SelectContatosIdDetalhes($parametros['cod_relacao_idioma']);
    }

    /**
     * Metodo carregaEndereco
     * 
     * Carrega os dados do cep digitado
     * Faz uma requisicao a tabela CepRuas chamando o metodo SelectCep passando o txt_cep 
     * por parametro. 
     * 
     * @param string[] $parametros array com o cep digitado
     * 
     * @return string[]
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
     * Metodo getEstados
     * 
     * Seleciona todos os estados cadastrados na tabela CepUf
     * Faz uma requisicao a tabela CepUf chamando o metodo getEstados. 
     * 
     * @return string[]
     */
    public function getEstados()
    {
        //Retorna os dados dos Contatoss
        return TableFactory::getInstance('CepUf')->getEstados();
    }
    
     /**
     * Metodo buscaCidades
     * 
     * Seleciona todos as cidades cadastradas na tabela CepCidades
     * Faz uma requisicao a tabela CepCidades chamando o metodo getCidades
     * passando o cod_uf por parametro.  
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     */
    public function buscaCidades($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Busco o endereço pelo CEP
        $recordset = TableFactory::getInstance('CepCidades')->getCidades($parametros['data']['cod_uf']);

        //Verifica se a requisição esta sendo feita via JSON
        if(isset($parametros['json_data']))
        {
            //Resposta do JSON
            echo Zend_Json::encode($recordset);
        }
        else
        {
            //Caso contrário então apenas retorna o resultado da consulta
            return $recordset;
        }
    }
    
    /**
     * Metodo EditaContatos
     * 
     * Edita os EditaContatos conforme os parametros passados.
     * Chama a tabela Contatos e o metodo ExecuteEditaContatos. 
     * 
     * @param string $parametros
     * 
     * @param string[] $parametros
     * 
     */
    public function EditaContatos($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validação
        $ComponenteValidacao = getComponent('validacoes/contatos.validacao', 'ContatosValidacao');

        //total de idiomas 
        $total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

        //Executa a Validação
        $resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros, $total_idiomas);

        //Verifica o resultado da validação
        if(count($resultado_validacao) == 0)
        {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //contatod usado para futuramente comparar quantos registros foram editados, ele vai incrementando
            $total = 0;

            for($i = 1; $i <= $total_idiomas; $i++)
            {
                //Tenta Cadastrar o Contatos
                if(TableFactory::getInstance('Contatos')->ExecuteEditaContatos($parametros, $i) === true)
                {
                    $total++;
                }
            }

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            if($total == $total_idiomas)
            {
                //Mensagem de confirmação via SESSION(usar sempre o indice view_data)
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                echo Zend_Json::encode(array("1"));
            }
            else
            {
                //Mensagem de confirmação via SESSION(usar sempre o indice view_data)
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                echo Zend_Json::encode(array("1"));
            }
        }
        else
        {
            //Resposta do JSON
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
    /**
     * Metodo SelectContatosEditar
     * 
     * Seleciona os contatos conforme o cod_id passado por parametro
     * Faz uma requisicao a tabela Contatos chamando o metodo SelectContatosEditar
     * passando o cod_id e o cod_relacao_idioma por parametro.  
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     */
    public function SelectContatosEditar($parametros)
    {
        $array_contatos = array();

        $dados_idioma = TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();

        foreach ($dados_idioma as $key => $idioma)
        {
            //Retorna os dados
            $dados_contatos = TableFactory::getInstance('Contatos')->SelectContatosEditar($parametros['cod_relacao_idioma'], $idioma['cod_id']);

            $array_contatos[$key]['cod_id'] = $dados_contatos['cod_id'];
            $array_contatos[$key]['txt_razao_social'] = $dados_contatos['txt_razao_social'];
            $array_contatos[$key]['txt_cnpj'] = $dados_contatos['txt_cnpj'];
            $array_contatos[$key]['txt_endereco'] = $dados_contatos['txt_endereco'];
            $array_contatos[$key]['txt_numero'] = $dados_contatos['txt_numero'];
            $array_contatos[$key]['txt_complemento'] = htmlentities($dados_contatos['txt_complemento'], ENT_QUOTES);
            $array_contatos[$key]['txt_cep'] = htmlentities($dados_contatos['txt_cep'], ENT_QUOTES);
            $array_contatos[$key]['txt_bairro'] = $dados_contatos['txt_bairro'];
            $array_contatos[$key]['cod_cidade'] = $dados_contatos['cod_cidade'];
            $array_contatos[$key]['cod_estado'] = $dados_contatos['cod_estado'];
            $array_contatos[$key]['txt_telefone'] = $dados_contatos['txt_telefone'];
            $array_contatos[$key]['txt_pais'] = $dados_contatos['txt_pais'];
            $array_contatos[$key]['cod_latitude'] = htmlentities($dados_contatos['cod_latitude'], ENT_QUOTES);
            $array_contatos[$key]['cod_longitude'] = htmlentities($dados_contatos['cod_longitude'], ENT_QUOTES);
            $array_contatos[$key]['cod_idioma'] = $idioma['cod_id'];
            $array_contatos[$key]['cod_relacao_idioma'] = $parametros['cod_relacao_idioma'];
            $array_contatos[$key]['txt_idioma'] = $idioma['txt_idioma'];
        }

        return $array_contatos;
    }
}
?>