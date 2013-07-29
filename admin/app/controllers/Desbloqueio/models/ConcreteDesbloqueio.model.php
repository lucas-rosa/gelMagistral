<?php
class ConcreteDesbloqueio
{	
	public function Desbloquear($parametros)
	{
		 $desbloqueio = TableFactory::getInstance('Usuarios')->desbloquearUsuario($parametros['id']);
		 $zerar_tentativas = TableFactory::getInstance('LogsTentativas')->ZerarTentativas($parametros['id']);
		 
		 
		 if($desbloqueio && $zerar_tentativas){
		 	return true;
		 }else{
		 	return false ;
		 }
		 
	}
} 
?>