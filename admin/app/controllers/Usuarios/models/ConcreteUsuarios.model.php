<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteUsuarios
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Usuarios
 * 
 * @package admin\app\controllers\Usuarios\models\ConcreteUsuarios
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteUsuarios
{
        /**
         * Metodo SelectUsuarios
	 * 
	 * Retorna todos os usuarios cadastrados.
         * Faz uma requisicao a tabela Usuarios chamando o metodo SelectUsuarios
         * 
         * @return string[]
         * 
	 */            
	public function SelectUsuarios()
	{
		return TableFactory::getInstance('Usuarios')->SelectUsuarios();
	}
        
        /**
         * Metodo ExcluirUsuario
	 * 
	 * Exclui um usuario conforme o cod_id.
         * Faz uma requisicao a tabela Usuarios chamando o metodo ExcluirUsuario 
         * passando o cod_id por parametro.
         * 
         * @param strin[] $parametros
         * 
         * @return string[]
         * 
	 */         
	public function ExcluirUsuario($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instanciando a tabela Usuarios e exclui
		$dados = TableFactory::getInstance('Usuarios')->ExcluirUsuario($parametros['cod_id']);

		//Busca os textos de erro
		$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		if($dados == true)
		{
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);

			echo Zend_Json::encode(array("1"));
		}
		else
		{
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);

			echo Zend_Json::encode(array("1"));
		}
	}
        
         /**
         * Metodo SelectControlerAcao
	 * 
	 * Lista o usuario selecionado.
         * Faz uma requisicao a tabela PermissaoGeral chamando o metodo SelectControlerAcao
         * 
         * @return string[]
         * 
	 */         
	public function SelectControlerAcao()
	{
		//Instanciando a tabela Usuarios para listar o usuario selecionado
		return TableFactory::getInstance('PermissaoGeral')->SelectControlerAcao();
	}
	
	/**
	 * Metodo SelectControlerAcaoId
         * 
	 * Seleciona as permissoes do usuario.
         * Faz uma requisicao a tabela PermissaoUsuario chamando o metodo SelectControlerAcaoId
         * passando por parametro o cod_id.
         * 
	 * @param string[] $parametros cod_id do usuario
	 */
	public function SelectControlerAcaoId($parametros)
	{
		//seleciona somente os dados do usu�rio
		return TableFactory::getInstance('PermissaoUsuario')->SelectControlerAcaoId($parametros['cod_id']);
	}

	/**
	 * Metodo SelectUsuarioId
         * 
	 * Seleciona os dados do usuario pelo Id.
         * Faz uma requisicao a tabela Usuarios chamando o metodo SelectUsuarioId
         * passando por parametro o cod_id.
         * 
         * @param string[] $parametros
         * 
         * @return string[]
	 */
	public function SelectUsuarioId($parametros)
	{
		//Instanciando a tabela Usuarios para listar o usuario selecionado
		return TableFactory::getInstance('Usuarios')->SelectUsuarioId($parametros['cod_id']);
	}

	/**
	 * Metodo SelectStatus
         * 
	 * Seleciona os status da tabela usuariosStatus.
         * Faz uma requisicao a tabela UsuariosStatus chamando o metodo SelectStatus
         * 
	 * @return string[]
	 */
	public function SelectStatus()
	{
		//Instanciando a tabela usuarioStatus para listar os perfis
		return TableFactory::getInstance('UsuariosStatus')->SelectStatus();
	}
        
        /**
	 * Metodo Editar
         * 
	 * Edita os dados do usuario pelo Id.
         * Faz uma requisicao a tabela Usuarios chamando o metodo EditarUsuarioId
         * passando por parametro o cod_id e os parametros a serem editados.
         * 
         * @param string[] $parametros
         * 
         * @return string[]
	 */
	public function Editar($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instanciamos o componente de valida��o
		$ComponenteValidacao = getComponent('validacoes/usuarios.validacao','ValidacaoUsuario');
			
		//Executamos a valida��o dos dados
		$resultado_validacao = $ComponenteValidacao->Validar($parametros);

		//Verifica o resultado da validacao
		if(count($resultado_validacao) == 0)
		{

			if($parametros['check_senha'] == "S")
			{
				$parametros['txt_senha'] = md5($parametros['txt_senha']);
			}

			
			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
                        
                        
			//exclui as permiss�es do usu�rio
			TableFactory::getInstance('PermissaoUsuario')->excluirPermissoes($parametros['cod_id']);
	
                        if(count($parametros['permissao']) > 0){
                            //adiciona permiss�es que necessitam de outra
                            $dados_array = TableFactory::getInstance('PermissaoGeralVinculo')->selecionarPermissoesVinculadas($parametros['permissao']);

                            //joga os valores para o array
                            $parametros['permissao'] = array_merge($parametros['permissao'], $dados_array);

                            //insere os valores checados no banco
                            foreach($parametros['permissao'] as $permissao)
                            {
                                    TableFactory::getInstance('PermissaoUsuario')->inserirPermissao($parametros['cod_id'], $permissao);
                            }
                        }
                        
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,null, true);
			
			//Edita o registro no banco de dados
			$edita_usuario = TableFactory::getInstance('Usuarios')->EditarUsuarioId($parametros);

			if($edita_usuario === true)
			{
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);
	
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);
	
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1"));
			}
			
		}
		else
		{
			//Retorna os erros de valida��o
			echo Zend_Json::encode($resultado_validacao);
		}
	}
        
        /**
	 * Metodo cadastraUsuario
         * 
	 * Cadastra os dados do usuario.
         * Faz uma requisicao a tabela Usuarios chamando o metodo cadastraUsuario
         * passando os dados por parametro.
         * 
         * @param string[] $parametros
         * 
         * @return string[]
	 */
	public function cadastraUsuario($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper
		$Helper = HelperFactory::getInstance();

		//Instancia o componente de valida��o
		$ComponenteValidacao = getComponent('validacoes/usuarios.validacao', 'ValidacaoUsuario');

		//Executa a Valida��o
		$resultado_validacao = $ComponenteValidacao->validar($parametros);

		//Verifica o resultado da valida��o
		if(count($resultado_validacao) == 0)
		{
			//Seleciona todas as permiss�es referentes ao vinculo escolhido
			$permissoes  = TableFactory::getInstance('PermissaoVinculo')->SelectPermissaoVinculoCodPerfil($parametros['cod_perfil']);
				
			//Trata os valores antes de enviar para o banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
			//Bota a senha no formato md5
			$parametros['txt_senha'] = md5($parametros['txt_senha']);
				
			//Cadastra o usuario, e retorna o codigo do usuario cadastrado
			$cod_usuario = TableFactory::getInstance('Usuarios')->cadastraUsuario($parametros);

			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			if(count($cod_usuario) > 0)
			{
				//Incluir permiss�o por permiss�o do vinculo escolhido para esse usuario
				for($i = 0; $i < count($permissoes); $i++)
				{
					TableFactory::getInstance('PermissaoUsuario')->inserirPermissao($cod_usuario, $permissoes[$i]['cod_permissaoGeral']);
				}
	
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);
	
				//Retorna para o json
				echo Zend_Json::encode(array('1'));
			}
			else
			{
				//Mensagem de confirma��o via SESSION(usar sempre o indice view_data)
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[64], 'erro' => true);
	
				//Retorna para o json
				echo Zend_Json::encode(array('1'));
			}
		}
		else
		{
			//Retorna os erros de valida��o
			echo Zend_Json::encode($resultado_validacao);
		}
	}
        
         /**
	 * Metodo cadastraUsuario
         * 
	 * Retorna os dados do Usuario pelo cod_id.
         * Faz uma requisicao a tabela Usuarios chamando o metodo SelectUsuarioId
         * passando o cod_id por parametro.
         * 
         * @param string[] $parametros
         * 
         * @return string[]
	 */
	public function getUsuarioById($parametros)
	{		
		//Retorna os dados
		return TableFactory::getInstance('Usuarios')->SelectUsuarioId($parametros['cod_id']);
	}
        
        /**
	 * Metodo ExecutegetUsuarios
         * 
	 * Busca o usuario pelo perfil, status, cliente e pagina.
         * Chama o metodo ExecuteBuscarUsuarios passando o perfil, status, cliente e pagina
         * por parametro. 
         * 
         * @param string[] $parametros
         * 
         * @return string[]
	 */
	public function ExecutegetUsuarios($parametros){

		//Retorna o resultado da consulta
                
                /********************************************
                 * O METODO ExecuteBuscarUsuarios NAO EXISTE*
                 * NESTE CONCRETE                           *
                 ********************************************/
		return $this->ExecuteBuscarUsuarios($parametros['perfil'],$parametros['status'],$parametros['cliente'],$parametros['pagina']);
	}
        
        /**
	 * Metodo getStatus
         * 
	 * Retorna os dados dos status do usuario.
         * Faz uma requisicao a tabela UsuariosStatus chamando o metodo getStatus.
         * 
	 * @return string[]
	 */
	public function getStatus(){
			
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('UsuariosStatus')->getStatus();
	}
        
        /**
	 * Metodo getPerfis
         * 
	 * Retorna os dados dos perfis de usuario.
         * Faz uma requisicao a tabela PermissaoPerfis chamando o metodo MontaComboPerfisUsuarios.
         * 
	 * @return string[]
	 */
	public function getPerfis(){
			
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('PermissaoPerfis')->MontaComboPerfisUsuarios();
	}
        
        /**
	 * Metodo getClientes
         * 
	 * Retorna os dados dos clientes.
         * Faz uma requisicao a tabela Clientes chamando o metodo buscarClientes.
         * 
	 * @return string[]
	 */
	public function getClientes(){
			
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('Clientes')->buscarClientes();
	}
        
        /**
	 * Metodo getPermissaoUsuarios
         * 
	 * Seleciona as permissoes do usuario selecionado.
         * Faz uma requisicao a tabela PermissaoGeral chamando o metodo selectPermissoesGeral
         * passando o cod_id por parametro.
         * 
         * @param string[] $parametros
         * 
	 * @return string[]
	 */
	public function getPermissaoUsuarios($parametros)
	{
		return TableFactory::getInstance('PermissaoGeral')->selectPermissoesGeral($parametros['cod_id'], $parametros['cod_perfil']);
	}
	
        /**
	 * Metodo verificaLogin
         * 
	 * Verifica se o login existe.
         * Faz uma requisicao a tabela Usuarios chamando o metodo VerificarLogin
         * passando os dados por parametro.
         * 
         * @param string[] $parametros
         * 
	 * @return string[]
	 */
	public function verificaLogin($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');
		
		//Busca os textos da tabela TextoLayoutAdmin
		$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			
		//se for inclus�o entra aqui
		if(!isset($parametros['cod_id_tipo']))
		{
			$verificacao = TableFactory::getInstance('Usuarios')->VerificarLogin($parametros);

			if($verificacao === true)
			{
				echo Zend_Json::encode(array("1", $mensagem[63]));
			}
			else
			{
				echo Zend_Json::encode(array("0"));
			}
		}
		
		//se for edi��o entra aqui
		else
		{
			$verificacao = TableFactory::getInstance('Usuarios')->VerificarLogin($parametros);

			if($verificacao === true)
			{
				echo Zend_Json::encode(array("1", $mensagem[63]));
			}
			else
			{
				echo Zend_Json::encode(array("0"));
			}
		}
	}
}
?>