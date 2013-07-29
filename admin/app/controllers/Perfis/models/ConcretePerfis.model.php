<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcretePerfis
 *
 * Esta classe e responsavel por todas as requisicoes a tabela PermissaoGeral
 * 
 * @package admin\app\controllers\Perfis\models\ConcretePerfis
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcretePerfis {
    /* public function SelectControlerAcao($parametros)
      {
      //verifica se tem o perfil na tabela permissaoPerfil
      if(TableFactory::getInstance('PermissaoPerfis')->getPerfilById($parametros['cod_perfil']))
      {
      //Instanciando a tabela PermissaoGeral e seleciona os controllers e aï¿½ï¿½es
      return TableFactory::getInstance('PermissaoGeral')->SelectControlerAcao($parametros);
      }
      else
      {
      return false;
      }
      } */

    /**
     * Metodo SelectControllerAcaoIncluir
     * 
     * Seleciona todos os dados cadastrados na tabela PermissaoGeral.
     * Faz uma requisicao a tabela PermissaoGeral chamando o metodo SelectControlerAcaoIncluir
     * 
     * @return string[]
     * 
     */
    public function SelectControllerAcaoIncluir() {
        return TableFactory::getInstance('PermissaoGeral')->SelectControlerAcaoIncluir();
    }

     /**
     * Metodo SelectControllerAcaoEditar
     * 
     * Seleciona todos os dados cadastrados na tabela PermissaoGeral conforme o id passado por parametro.
     * Faz uma requisicao a tabela PermissaoGeral chamando o metodo SelectControllerAcaoEditar 
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function SelectControllerAcaoEditar($parametros) {
        return TableFactory::getInstance('PermissaoGeral')->SelectControllerAcaoEditar($parametros);
    }

     /**
     * Metodo SelectPermissaoPerfilTipo
     * 
     * Seleciona todos os dados cadastrados na tabela PermissaoPerfis conforme o tipo passado por parametro.
     * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo SelectPermissaoPerfilTipo
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function SelectPermissaoPerfilTipo($parametros) {
        return TableFactory::getInstance('PermissaoPerfis')->SelectPermissaoPerfilTipo($parametros['cod_tipo']);
    }
    
     /**
     * Metodo SelectNomePerfil
     * 
     * Seleciona todos os dados cadastrados na tabela PermissaoPerfis conforme o nome passado por parametro.
     * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo SelectNome
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function SelectNomePerfil($parametros) {
        return TableFactory::getInstance('PermissaoPerfis')->SelectNome($parametros);
    }
    
     /**
     * Metodo SelectNomePerfil
     * 
     * Cadastra os dados na tabela PermissaoVinculo.
     * Faz uma requisicao a tabela PermissaoVinculo chamando o metodo IncluirPermissaoVinculo passando 
     * os dados por parametro. 
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function CadastraControlerAcao($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instanciamos o componente de validaï¿½ï¿½o
        $ComponenteValidacao = getComponent('validacoes/perfis.validacao', 'ValidacaoPerfis');

        //Executamos a validaï¿½ï¿½o dos dados
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validacao
        if (count($resultado_validacao) == 0) {
			//Coloca o nome dentro de um array especifico
        	$array_nome = $parametros ;
        	
        	//Retira o controller acao desse array para o nome
			unset($array_nome['controller_acao']);
			
            //Trata o nome antes de inserir no banco de dados
        	$array_nome = HelperFactory::getInstance()->TrataValor($array_nome,null,null,null,true);
            
            //Instanciando a tabela PermissaoPerfis e inclui
            $id_permissao = TableFactory::getInstance('PermissaoPerfis')->IncluirPermissaoPerfil($array_nome);
            
            if(count($parametros['controller_acao']) > 0){
                //adiciona permissï¿½es que necessitam de outra
                $dados_array = TableFactory::getInstance('PermissaoGeralVinculo')->selecionarPermissoesVinculadas($parametros['controller_acao']);

                //joga os valores para o array
                $parametros['controller_acao'] = array_merge($parametros['controller_acao'], $dados_array);

                foreach ($parametros['controller_acao'] as $ca) {
                    TableFactory::getInstance('PermissaoVinculo')->IncluirPermissaoVinculo($ca, $id_permissao);
                }
            }

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            //Mensagem de confirmaï¿½ï¿½o
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);

            //Retorna para o javascript
            echo Zend_Json::encode(array("1"));
        } else {
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
    
     /**
     * Metodo SelectNomePerfil
     * 
     * Seleciona os perfis da tabela permissaoPerfis.
     * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo SelectPermissaoPerfil
     * 
     * @return string[]
     * 
     */
    public function SelectPermissaoPerfil() {
        return TableFactory::getInstance('PermissaoPerfis')->SelectPermissaoPerfil();
    }
    
    
     /**
     * Metodo SelectPermissaoVinculoId
     * 
     * Seleciona a permissao selecionada.
     * Faz uma requisicao a tabela PermissaoVinculo chamando o metodo SelectPermissaoVinculoId
     * passando o cod_perfil por parametro. 
     * 
     * @param string $parametros  
     * 
     * @return string[]
     * 
     */
    public function SelectPermissaoVinculoId($parametros) {
        return TableFactory::getInstance('PermissaoVinculo')->SelectPermissaoVinculoId($parametros['cod_perfil']);
    }
    
    /**
     * Metodo EditarControlerAcao
     * 
     *  Edita os controllers e acoes selecionados.
     * Faz uma requisicao a tabela PermissaoGeralVinculo chamando o metodo SelectPermissoesVinculadas
     * passando o controller_acao por parametro. 
     * 
     * @param string $parametros  
     * 
     * @return string[]
     * 
     */
    public function EditarControlerAcao($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instanciamos o componente de validação
        $ComponenteValidacao = getComponent('validacoes/perfis.validacao', 'ValidacaoPerfis');

        //Executamos a validação dos dados
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validacao
        if (count($resultado_validacao) == 0) {
            //apaga os valores do cod_perfil
            TableFactory::getInstance('PermissaoVinculo')->DeleteControlerAcao($parametros);

            if (!empty($parametros['controller_acao'])) {
                //adiciona permissões que necessitam de outra
                $dados_array = TableFactory::getInstance('PermissaoGeralVinculo')->selecionarPermissoesVinculadas($parametros['controller_acao']);

                //joga os valores para o array
                $parametros['controller_acao'] = array_merge($parametros['controller_acao'], $dados_array);

                //insere os valores checados no banco
                foreach ($parametros['controller_acao'] as $controler_acao) {
                    TableFactory::getInstance('PermissaoVinculo')->EditarControlerAcao($controler_acao, $parametros['cod_tipo']);
                }
            }

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            if (TableFactory::getInstance('PermissaoPerfis')->EditaPermissaoPerfil($parametros) === true) {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                echo Zend_Json::encode(array("1"));
            } else {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
    /**
     * Metodo ExcluirPerfil
     * 
     * Exclui o perfil conforme os dados passados por parametro.
     * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo excluirPerfis
     * passando true ou false por parametro. 
     * 
     * @param string $parametros  
     * 
     * @return string[]
     * 
     */
    public function ExcluirPerfil($parametros) {
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia a mensagem
        $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Exclui o perfil
        if (TableFactory::getInstance('PermissaoPerfis')->excluirPerfis($parametros) === true) {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);

            echo Zend_Json::encode(array("1"));
        } else {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);

            echo Zend_Json::encode(array("1"));
        }
    }
    
     /**
     * Metodo VerificaLogin
     * 
     * Verifica se o login existe.
     * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo VerificarLogin 
     * 
     * @param string $parametros  
     * 
     * @return string[]
     * 
     */
    public function VerificaLogin($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Busca os textos da tabela TextoLayoutAdmin
        $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //se for inclusï¿½o entra aqui
        if (!isset($parametros['cod_tipo'])) {
            $verificacao = TableFactory::getInstance('PermissaoPerfis')->VerificarLogin($parametros);

            if ($verificacao === true) {
                echo Zend_Json::encode(array("1", $mensagem[63]));
            } else {
                echo Zend_Json::encode(array("0"));
            }
        }

        //se for edição entra aqui
        else {
            $verificacao = TableFactory::getInstance('PermissaoPerfis')->VerificarLogin($parametros);

            if ($verificacao === true) {
                echo Zend_Json::encode(array("1", $mensagem[63]));
            } else {
                echo Zend_Json::encode(array("0"));
            }
        }
    }

}

?>