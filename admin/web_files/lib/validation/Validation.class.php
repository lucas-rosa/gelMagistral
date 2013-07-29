<?php
/** Author Arilson Gon�alves da Rosa
 * Classe Para valida��o de Dados
 * @version 1.0
 */
class Validation {

    /**
     * Atributo que receber� os valores dos dados da valida��o
     * e o nome do campo
     * @var ARRAY $dados
     */
    private $dados;
    /**
     * Atributo que receber� as mensagens de erro
     * @var ARRAY $erro
     */
    private $erro = array();
    
    /**
     * Caso deseje que as mensagens sejam codificadas para utf-8 ent�o este atributo dever� ser true
     * @var Boolean
     */
    public $encode = false;

    /**
     * M�todo que recebe os valores de valida��o e nome do campo
     * @param STRING $valor - Valor Digitado pelo Usu�rio
     * @param STRING $mensagem  - Mensagem (Mensagem de erro que aparecer� para o usu�rio)
     * @param STRING $field_name - Atributo Name do campo no input HTML
     * @param STRING $html_id_element - Id do element html que dever� receber a mensagem de erro (usado para JSON)  
     * caso seja preciso exibir a mensagem de erro em um elemento HTML neste par�metro($html_id_element) pode ser passado o id do elemento
     * @return $this (retorna o pr�prio objeto)
     */
    public function set($valor, $mensagem,$field_name,$html_id_element=null) {
        $this->dados = array("valor" => trim($valor), "mensagem" => $mensagem, "field_name" => $field_name ,"html_id_element" => $html_id_element);
        return $this;
    }

    /**
     *  M�todo que verifica se � o valor � obrigat�rio
     *  @return $this (retorna o pr�prio objeto)
     */
    public function obrigatorio() {
    	
    	//Verifica se existe alguma informa��o inserida no campo
        if (strlen(trim($this->dados['valor'])) == 0) {
        	
        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
            
        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
            
        	//Verifica se o elemento html foi informado
            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];            
        }
        return $this;
    }
    
     /**
     *  M�todo que verifica se o valor � num�rico
     *  @return $this (retorna o pr�prio objeto)
     */
    public function numerico() {
        if (!is_numeric($this->dados['valor'])) {
        	
        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
            
        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
            
        	//Verifica se o elemento html foi informado
            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
        }
        return $this;
    }

     /**
     *  M�todo que Valida o CPF
     *  @return $this (retorna o pr�prio objeto)
     */
    public function cpf()
    {
    	//Removendo pontos e hifen
    	$array_search = array(".","-");
    	$array_replace = array("","");
    	$this->dados['valor'] = str_replace($array_search,$array_replace,$this->dados['valor']);

    	// Verifiva se o n�mero digitado cont�m todos os digitos
    	$this->dados['valor'] = str_pad(ereg_replace('[^0-9]', '', $this->dados['valor']), 11, '0', STR_PAD_LEFT);
    		
    	// Verifica se nenhuma das sequ�ncias abaixo foi digitada, caso seja, retorna falso
    	if (strlen($this->dados['valor']) != 11 || $this->dados['valor'] == '00000000000' || $this->dados['valor'] == '11111111111' || $this->dados['valor'] == '22222222222' || $this->dados['valor'] == '33333333333' || $this->dados['valor'] == '44444444444' || $this->dados['valor'] == '55555555555' || $this->dados['valor'] == '66666666666' || $this->dados['valor'] == '77777777777' || $this->dados['valor'] == '88888888888' || $this->dados['valor'] == '99999999999')
    	{
    		//Mensagem de Erro
    		$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);

    		//Grava no array de erros
    		$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;

    		//Verifica se o elemento html foi informado
    		if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];

    		//Retorna o objeto
    		return $this;
    	}
    	else
    	{   // Calcula os n�meros para verificar se o CPF � verdadeiro
    		for ($t = 9; $t < 11; $t++)
    		{
    			for ($d = 0, $c = 0; $c < $t; $c++)
    			{
    				$d += $this->dados['valor']{$c} * (($t + 1) - $c);
    			}

    			$d = ((10 * $d) % 11) % 10;

    			if ($this->dados['valor']{$c} != $d)
    			{
    				//Mensagem de Erro
    				$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
    				$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;

    				//Verifica se o elemento html foi informado
    				if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
    				//Retorna o objeto
    				return $this;
    			}
    		}

    		//Retorna o objeto
		    return $this;
		}
	}

	/**
     * M�todo que verifica se o email � v�lido
     * @return $this (retorna o pr�prio objeto)
     */
    public function email() {
    	
    	//Valida o email somente se o mesmo estiver preenchido
    	if(strlen(trim($this->dados['valor'])) > 0){
    	
		        if (!filter_var($this->dados['valor'], FILTER_VALIDATE_EMAIL)) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}        
        return $this;
    }

    /**
     * M�todo que verifica se a data esta no formato dd/mm/YYYY
     * @return $this (retorna o pr�prio objeto)
     */
    public function data() {
    	
    	//Verifica se h� valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    	
		        //99/99/9999
		        if (!preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $this->dados['valor']) || !HelperFactory::getInstance()->ChecarData($this->dados['valor'],'br')) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;
    }
    
    /**
     * Enter description here ...
     * @return $this (retorna o pr�prio objeto)
     */
    public function datahora(){

    	//Trata o dado
    	$this->dados['valor'] = trim(str_replace(" ", "", $this->dados['valor']));
    	
    	  //Verifica se h� valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    		
    		   //Compara��es
    		   $validar_formato_data_hora = !preg_match("/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})([01][0-9]|2[0-3]):([0-5][0-9])$/", $this->dados['valor']);    		   
    		   $validar_data_hora = !HelperFactory::getInstance()->ChecarDataHora($this->dados['valor']);
    		   
		        //Valida o timestamp
		        if ($validar_formato_data_hora || $validar_data_hora) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;    	    	
    }
    
    public function datahoraminutosegundo()
    {
    	//Trata o dado
    	$this->dados['valor'] = trim(str_replace(" ", "", $this->dados['valor']));
    	
    	//Verifica se h� valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0)
    	{
    		//Compara��es
    		$validar_formato_data_hora = !preg_match("/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $this->dados['valor']);    		   
    		$validar_data_hora = !HelperFactory::getInstance()->ChecarDataHora($this->dados['valor']);
    		   
		    //Valida o timestamp
		    if ($validar_formato_data_hora || $validar_data_hora)
		    {
		    	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		    	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        //Verifica se o elemento html foi informado
		        if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		    }        
    	}
        
        return $this;  
    }

    /**
     * M�todo que verifica se o telefone est� no formato (99)9999-9999
     * @return $this (retorna o pr�prio objeto)
     */
    public function telefone() {
    	
    	//Verifica se h� valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    	
		       //Removemos os espa�os em branco da String	
		       $this->dados['valor'] = str_replace(" ","",$this->dados['valor']);
		    	//Validando no Formato (99)9999-9999
		        if (!preg_match("/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/", $this->dados['valor'])) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;
    }
    
    /**
     * Valida um Captcha
     * @param String $session_value -> Valor gerado na sess�o     
     */
    public function captcha($session_value){
    	 //Valida o Captcha
         if(!(strcmp($session_value,$this->dados['valor']) == 0)){
         	 
         	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
	   	   	 
         	 $this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
            
        	//Verifica se o elemento html foi informado
            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
	   	 }
	   	return $this; 
    }
    
	
    /**
     * Compara duas senhas
     * @param Array $parametros
     * @return $this (Retorna o pr�prio objeto)
     */
    public function CompararSenha($primeira_senha,$segunda_senha)
	{
		//Verifica se ambas as senhas foram informadas
		if(strlen(trim($primeira_senha)) > 0 && strlen(trim($segunda_senha)) > 0){

				//Compara as senhas
				if(!strcmp($primeira_senha, $segunda_senha) == 0)
				{
					$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
			   	   	
					$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];			
				}		
		}
		
		//Retorna o pr�prio objeto
		return $this;
	}
	
	/**
	 * M�todo que verifica se o valor � menor que o numero informado
	 * @param int $numero
	 * @return $this (retorna o pr�prio objeto)
	 */
	public function menor($numero)
	{
		//Verifica se existe valor para comparar
		if(strlen($this->dados['valor']) > 0){
		
				if(strlen($this->dados['valor']) < $numero)
				{
					$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
					
					$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		
					//Verifica se o elemento html foi informado
					if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
				}
		
		}
		return $this;
	}
	
	/**
     *  M�todo que verifica o myme_type do arquivo
     *  @return $this (retorna o pr�prio objeto)
     */
    public function arquivo($mime_type)
    {
        //Verifica se existe valor para comparar
		if(strlen($this->dados['valor']) > 0)
		{
			$mime_list = $this->mime_type($mime_type);
			
			//Mime list
			$mime_list = explode(",", $mime_list);

			//Verifica se o arquivo � uma imagem
			if(!in_array($_FILES[$this->dados['field_name']]['type'],$mime_list))
			{
				$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
				
				$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
	
				//Verifica se o elemento html foi informado
				if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
			}
		
		}
		return $this;
    }
    
	public function mime_type($tipos_arquivos)
    {
    	$array_mime = explode(",", $tipos_arquivos);
    	
    	$mime_type = "";

	    foreach ($array_mime as $value)
	    {
	    	$value = trim($value);
	    	
	    	if(strcasecmp($value, 'jpeg') == 0 || strcasecmp($value, 'jpg') == 0)
	    	{
	    		$mime_type .= 'image/jpeg';
	    	}
	    	elseif(strcasecmp($value, 'gif') == 0)
	    	{
	    		$mime_type .= 'image/gif';
	    	}
	    	elseif(strcasecmp($value, 'png') == 0)
	    	{
	    		$mime_type .= 'image/png';
	    	}
	    	elseif(strcasecmp($value, 'bmp') == 0)
	    	{
	    		$mime_type .= 'image/bmp';
	    	}
	    	elseif(strcasecmp($value, 'tiff') == 0)
	    	{
	    		$mime_type .= 'image/tiff';
	    	}
	    	elseif(strcasecmp($value, 'pdf') == 0)
	    	{
	    		$mime_type .= 'application/pdf';
	    	}
                elseif (strcasecmp($value, 'swf') == 0)
                {
                    $mime_type .= 'application/x-shockwave-flash';
                }
	    	
	    	$mime_type.=",";
	    }

	    return $mime_type;
    }
	
	/**
	 * Acrescenta um erro personalizado na valida��o
	 * @param String $field_name
	 * @param String $mensagem
	 * @param String $html_id_element
	 * returns void
	 */
	public function setNewError($field_name,$mensagem,$html_id_element=null){
		
		//Traduz os caracteres caso seja preciso
		$mensagem = ($this->encode == true ? utf8_encode($mensagem) : $mensagem);
		
		//Mensagem do erro
		$this->erro[$field_name]['mensagem'] = $mensagem;
		
		//Verifica se o elemento html foi informado
		if(!is_null($html_id_element)) $this->erro[$field_name]['id_element'] = $html_id_element;
	}

    /**
     * M�todo que verifica se teve alguma mensagem de erro
     * @return BOOLEANO (true/false) 
     */
    public function validar() {
        if (count($this->erro) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * M�todo que retorna os erros encontrados
     * @return ARRAY $erro
     */
    public function getErrors() {
        return $this->erro;
    }
}
?>