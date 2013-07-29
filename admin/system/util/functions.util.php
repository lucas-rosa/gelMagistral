<?php
    /**
	 * Atribui valores para os campos desta tabela
	 * @param Object $Objetotabela
	 * @param Array $values
	 * @param Boolean $update
	 */
	function getTableValues($Objetotabela,$values,$update=false){
		
	    //Inserindo		
		if(!$update){
		
			    //Busca os campos da tabela
			    $tabela = $Objetotabela->getTable()->getColumnNames();	   
			    
		        foreach($tabela as $campo){
		        
		        	//S� Salva se tiver conteudo 
					if(strlen(trim($values[$campo])) > 0){
		        		
						//Pega os dados do Array e joga nos atributos da tabela
						$Objetotabela->$campo = $values[$campo];
					}        	        	
		        }	 
		}
		    //Atualizando
			else{
				
					//Percorre os atributos da tabela
					foreach($Objetotabela as $chave => $valor){
													
						//S� Salva se tiver conteudo 
						if(strlen(trim($values[$chave])) > 0){
						
							//Pega os dados do Array e joga nos atributos da tabela
							$Objetotabela->$chave = $values[$chave];
		
						}
					}
			}  
			
		//Retorna o objeto com os dados
		return $Objetotabela;	 
	}
	
	/**
	 * Retorna um componente da Entidade Acessada no momento
	 * @param String $pathToClass
	 * @param String $Classname
	 * @param Multitype $params
	 */
	function getComponent($pathToClass,$Classname=null,$params=null){
		
		//Caminho da Classe
		$pathToClass = __ROOT__.CONTROLLERS.CONTROLLER_ATUAL."/models/".$pathToClass.".php";
		
		//Verifica se o Arquivo Existe
		if(is_file($pathToClass)){
			
			    //Inclui o arquivo
			    include_once($pathToClass);
			    
			    //Verifica se o par�metro Classname � nulo
			    if(!is_null($Classname)){
			    
					    //Verifica se a classe existe
					    if(class_exists($Classname)){			    
						    //Instancia a Classe
						    return new $Classname;
						    			    
					    }else{
					    	
					    	die("A classe solicitada n�o existe na entidade");
					    }
			    }			
		}else{
			die("O arquivo da classe solicitada n�o existe na entidade");
		}		
	}
?>