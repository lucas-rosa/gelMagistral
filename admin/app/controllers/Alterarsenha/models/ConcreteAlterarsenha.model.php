<?php
class ConcreteAlterarsenha{
	public function alterar($parametros){
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper
		$Helper = HelperFactory::getInstance();

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/Alterarsenha.validacao','AlterarsenhaValidacao');

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Trata os valores que vão ser incluidos no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//Altera senha
			TableFactory::getInstance('Usuarios')->alterarSenha($parametros['id_usuario'],$parametros['txt_senha'] );
		
			//Busca os textos de mensagem
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[66], 'sucesso' => true);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}

	}
}