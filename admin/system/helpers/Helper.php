<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe Helper
 *
 * Armazena as principais funcoes auxiliares do sistema
 *
 * @package admin\system\helpers\Helper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 *
 */
class Helper {

	/**
	 * Metodo TrataValor
	 *
	 * Trata campo vindo de uma requisicao POST - levando em conta os parametros informados
	 *
	 *
	 * @param String $campo
	 * @param Boolean $slashes
	 * @param Boolean $trim
	 * @param Array $replace -> posicao 0 devera conter o que deve ser procurado na string -> posicao 1 o que devera ser substituido
	 * Exemplo -> str_replace(array(";"),array(","),variavel); onde variavel significa qual variavel recebera a substituicao
	 * portanto o parametro replace devera ser um array com duas posicoes e ambas posicoes devem ser arrays conforme exemplo.
	 *
	 * @param string $decode
	 *
	 * @return String
	 */
	public function TrataValor($campo,$slashes=null,$trim=null,$replace=null,$decode=null)
	{
		//Verifica se campo é um Array
		if(is_array($campo))
		{
			//Percorre o Array de campos
			foreach($campo as $chave => $valor)
			{
				//Trata os valores
				$campo[$chave] = ($slashes == true ? addslashes($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($trim == true ? trim($campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo[$chave]) : $campo[$chave]);
				$campo[$chave] = ($decode == true ? utf8_decode($campo[$chave]) : $campo[$chave]);
			}
			//Se cair aqui então foi passado um único campo
		}
		else
		{
			//Trata o campo
			$campo = ($slashes == true ? addslashes($campo) : $campo);
			$campo = ($trim == true ? trim($campo) : $campo);
			$campo = ($replace != null && is_array($replace) ? str_replace($replace[0],$replace[1],$campo) : $campo);
			$campo = ($utf8_decode == true ? utf8_decode($campo) : $campo);
		}

		//Retorna o parâmetro tratado
		return $campo;
	}

	/**
	 * Metodo antiInjection
	 *
	 * Tratamento Contra SQL Injection
	 *
	 * @param multitype $var
	 * @param String $q
	 * @return string|multitype:
	 */
	public function antiInjection ($var,$q='') {
		//Verifica se o parâmetro é um array
		if (!is_array($var)) {
			//identifico o tipo da variável e trato a string
			switch (gettype($var)) {
				case 'double':
				case 'integer':
					$return = $var;
					break;
				case 'string':
					/*Verifico quantas vírgulas tem na string.
					 Se for mais de uma trato como string normal,
					 caso contrário trato como String Numérica*/
					$temp = (substr_count($var,',')==1) ? str_replace(',','*;*',$var) : $var;
					//aqui eu verifico se existe valor para não adicionar aspas desnecessariamente
					if (!empty($temp)) {
						if (is_numeric(str_replace('*;*','.',$temp))) {
							$temp = str_replace('*;*','.',$temp);
							$return = strstr($temp,'.') ? floatval($temp) : intval($temp);
						} elseif (get_magic_quotes_gpc()) {
							//aqui eu verifico o parametro q para o caso de ser necessário utilizar LIKE com %
							$return = (empty($q)) ? '\''.str_replace('*;*',',',$temp).'\'' : '\'%'.str_replace('*;*',',',$temp).'%\'';
						} else {
							//aqui eu verifico o parametro q para o caso de ser necessário utilizar LIKE com %
							$return = (empty($q)) ? '\''.addslashes(str_replace('*;*',',',$temp)).'\'' : '\'%'.addslashes(str_replace('*;*',',',$temp)).'%\'';
						}
					} else {
						$return = $temp;
					}
					break;
				default:
					/*Abaixo eu coloquei uma msg de erro para poder tratar
					 antes de realizar a query caso seja enviado um valor
					 que nao condiz com nenhum dos tipos tratatos desta
					 função. Porém você pode usar o retorno como preferir*/
					$return = 'Erro: O Tipo da Variável é Inválido!';
			}
			//Retorna o valor tipado
			return $return;
		} else {
			//Retorna os valores tipados de um array
			return array_map('antiInjection',$var);
		}
	}

	/**
	 * Metodo VerifyAction
	 *
	 * Valida uma acao vinda de um campo hidden(via POST)
	 *
	 * @param String $action_name nome da action
	 * @param String $action_value valor da action
	 *
	 * @return boolean
	 *
	 */
	public function VerifyAction($action_name,$action_value)
	{
		if(strcmp($_POST[$action_name],$action_value) == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Metodo createPermalink
	 *
	 * Retorna o permalink da URL
	 *
	 * @param string $value
	 * @param integer $id
	 * @param boolean $Remove_special_characters
	 *
	 * @return string
	 */
	public function createPermalink($value,$id,$Remove_special_characters=true)
	{
		//Remove espaços em branco e coloca hifen
		$value = preg_replace('/\s/', '-', $value);
			
		//Valida o permalink
		$value = preg_replace('([^a-zA-Z0-9]+$)', '', $value);
			
		//Verifica se deve remover caracteres especiais
		if($Remove_special_characters)
		{
			//Remove os caracteres especiais
			$value = $this->RemoverAcentos($value);
		}
		//Retorna o permalink
		return trim($id."-".$value);
	}

	/**
	 * Retorna o permalink da URL
	 * @author Linea Comunicação com Design - http://www.lineacom.com.br
	 */
	/*public function getPermalink()
	 {
		//Divide a URL
		$requested_permalink = explode('/', substr($_SERVER['REQUEST_URI'],URL_OFFSET),3);

		//Pega o permalink
		$requested_permalink = $requested_permalink[2];

		//Verifica a posição final da String
		$pos_final = strpos($requested_permalink,'/');
		$pos_final = ($pos_final != false ? $pos_final : strlen($requested_permalink));

		//Permalink
		$permalink = explode('-', substr($requested_permalink,0,$pos_final),2);

		//Retorna o id encontrado no permalink
		return (strlen(trim($permalink[0])) > 0 ? $permalink[0] : false);
		}*/


	/**
	 * Metodo getPermalink
	 *
	 * Retorna o permalink da URL
	 *
	 * @param boolean $full_permalink
	 *
	 * @return string
	 */
	public function getPermalink($full_permalink=false)
	{
		//Divide a URL
		$requested_permalink = explode('/', substr($_SERVER['REQUEST_URI'],URL_OFFSET),3);

		//Pega o permalink
		$requested_permalink = $requested_permalink[2];

		//Verifica a posição final da String
		$pos_final = strpos($requested_permalink,'/');
		$pos_final = ($pos_final != false ? $pos_final : strlen($requested_permalink));

		/*Verifica se é necessário pegar o Permalink inteiro ex: produtos/categoria/editar
		 ou somente o id
		 ex: produtos/categoria/1-categoria_teste
		 */
		if($full_permalink)
		{
			//Recebe o permalink
			$permalink = substr($requested_permalink,0,$pos_final);

			//Valida o permalink
			if($permalink !== false){

				//Retorna o permalink
				return $permalink;

			}else{

				//Invoca o erro 404
				$this->show404Error();
			}

			//Retorna todo o permalink
			return ($permalink !== false ? $permalink : false);

		}
		else
		{
			//Permalink
			$permalink = explode('-', substr($requested_permalink,0,$pos_final),2);

			//Valida o permalink
			if(strlen(trim($permalink[0])) > 0){

				//Retorna o id encontrado no permalink
				return $permalink[0];

			}else{

				//Invoca o erro 404
				$this->show404Error();
			}
		}
	}

	/**
	 * Metodo TirarAcentos
	 *
	 * Remove os Acentos de uma String e converte para a realidade HTML
	 *
	 * @param String $str
	 *
	 * @return String
	 *
	 */
	public function TirarAcentos($str){

		$acentos = array(
        'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
        'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
        'C' => '/&Ccedil;/',
        'c' => '/&ccedil;/',
        'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
        'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
        'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
        'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
        'N' => '/&Ntilde;/',
        'n' => '/&ntilde;/',
        'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
        'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
        'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
        'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
        'Y' => '/&Yacute;/',
        'y' => '/&yacute;|&yuml;/',
        'a.' => '/&ordf;/',
        'o.' => '/&ordm;/');    

		return preg_replace($acentos,array_keys($acentos),htmlentities($str,ENT_NOQUOTES,"UTF-8"));
	}

	/**
	 * Metodo RemoverAcentos
	 *
	 * Remove os Acentos de uma String
	 *
	 * @param String $var
	 *
	 * @return String
	 *
	 */
	public function RemoverAcentos($var)
	{
		$var = preg_replace("/Á|À|Â|Ã/","A",$var);
		$var = preg_replace("/á|à|â|ã|ª/","a",$var);
		$var = preg_replace("/É|È|Ê/","E",$var);
		$var = preg_replace("/é|è|ê/","e",$var);
		$var = preg_replace("/Í|Ì|Î|Ï/","U",$var);
		$var = preg_replace("/í|ì|î|ï/","u",$var);
		$var = preg_replace("/Ó|Ò|Ô|Õ/","O",$var);
		$var = preg_replace("/ó|ò|ô|õ|º/","o",$var);
		$var = preg_replace("/Ú|Ù|Û/","U",$var);
		$var = preg_replace("/ú|ù|û/","u",$var);
		$var = preg_replace("/Ç/","C",$var);
		$var = preg_replace("/ç/","c",$var);
		$var = preg_replace("/#/","",$var);
		$var = preg_replace("/$/","",$var);
		$var = preg_replace("/%/","",$var);
		$var = preg_replace("/&/","",$var);
		$var = preg_replace("/‘/","",$var);
		$var = preg_replace("/,/","",$var);
		$var = preg_replace("/-/","",$var);
		$var = preg_replace("/@/","",$var);
		$var = preg_replace("/|/","",$var);
		$var = preg_replace("/~/","",$var);
		$var = preg_replace("/¡/","",$var);
		$var = preg_replace("/§/","",$var);
		$var = preg_replace("/¨/","",$var);
		$var = preg_replace("/©/","",$var);
		$var = preg_replace("/ª/","",$var);
		$var = preg_replace("/«/","",$var);
		$var = preg_replace("/®/","",$var);
		$var = preg_replace("/²/","",$var);
		$var = preg_replace("/³/","",$var);
		$var = preg_replace("/´/","",$var);
		$var = preg_replace("/¹/","",$var);
		$var = preg_replace("/ /","",$var);
		

		return $var;
	}

	/**
	 * Metodo gerarSenha
	 *
	 * Gera uma Senha com base em uma forca
	 *
	 * @param int $tamanho
	 * @param int $forca
	 *
	 * @return string
	 *
	 */
	public function gerarSenha($tamanho=9, $forca=0)
	{
		$vogais = 'aeuy';

		$consoantes = 'bdghjmnpqrstvz';

		if ($forca >= 1)
		{
			$consoantes .= 'BDGHJLMNPQRSTVWXZ';
		}

		if ($forca >= 2)
		{
			$vogais .= "AEUY";
		}

		if ($forca >= 4)
		{
			$consoantes .= '23456789';
		}

		if ($forca >= 8 )
		{
			$vogais .= '@#$%';
		}

		$senha = '';
		$alt = time() % 2;

		for ($i = 0; $i < $tamanho; $i++)
		{
			if ($alt == 1)
			{
				$senha .= $consoantes[(rand() % strlen($consoantes))];
				$alt = 0;
			}
			else
			{
				$senha .= $vogais[(rand() % strlen($vogais))];
				$alt = 1;
			}
		}
		return $senha;
	}

	/**
	 * FormataData
	 *
	 * Retorna a data formatada de acordo com o tipo informado
	 *
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 *
	 * @return string
	 *
	 */
	public function FormataData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data;
	}

	/**
	 * Metodo FormataDataHora
	 *
	 * Retorna a data formatada de acordo com o tipo informado
	 *
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 *
	 * @return string
	 *
	 */
	public function FormataDataHora($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);
		//Remove os espacos em branco da data
		$data_hora = trim($data);
		//Extrai a data
		$data = substr($data, 0,10);
		//Extrai a hora
		$hora = substr($data_hora,10);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = implode("-",array_reverse(explode("/",$data)));
		}
		else if($tipo == "br")
		{
			$data = implode("/",array_reverse(explode("-",$data)));
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}
		return $data." ".$hora;
	}


	/**
	 * Metodo ChecarData
	 *
	 * Verifica se uma Data e valida de acordo com o formato especificado
	 *
	 * @param String $data
	 * @param String $tipo
	 * @throws Exception
	 *
	 * @return boolean
	 *
	 */
	public function ChecarData($data,$tipo)
	{
		//Passamos o formato para caixa baixa(afim de padronizar o parametro)
		$tipo = strtolower($tipo);

		//Verificamos o formato solicitado e formatamos de acordo
		if($tipo == "usa")
		{
			$data = explode("-",$data);
			$month = $data[1];
			$day = $data[2];
			$year = $data[0];
		}
		else if($tipo == "br")
		{
			$data = explode("/",$data);
			$month = $data[1];
			$day = $data[0];
			$year = $data[2];
		}
		else
		{
			throw  new Exception("Parametro Invalido - FormataData - Esperado tipo br ou usa");
		}

		//Verificamos se a data e valida
		if(@checkdate($month, $day, $year))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Metodo ChecarHora
	 *
	 * Verifica se um horario e valido
	 *
	 * @param String $horario
	 *
	 * @return boolean
	 *
	 */
	public function ChecarHora($horario)
	{
		//Verifica se o horário é válido
		if(strtotime($horario))
		{
			//Retorna true em caso de sucesso
			return true;

		}
		else
		{
			//Retorna false em caso de erro
			return false;
		}
	}

	/**
	 * Metodo ChecarDataHora
	 *
	 * Verifica se um datetime e valido
	 *
	 * @param String $timestamp
	 *
	 * @return boolean
	 *
	 */
	public function ChecarDataHora($timestamp)
	{
		//Remove os espacos em branco da data
		$datahora = trim($timestamp);
		//Extrai a data
		$data = substr($datahora, 0,10);
		//Extrai a hora
		$hora = substr($datahora,10);

		//Valida o timestamp
		if($this->ChecarData($data, 'br') && $this->ChecarHora($hora))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Metodo FormataCEP
	 *
	 * Formata o cep vindo do banco por exemplo
	 *
	 * @param int $cep
	 *
	 * @return string
	 *
	 */
	public function FormataCEP($cep)
	{
		$cep = preg_replace('/\D/', "", $cep);
		if (strlen($cep) == 8)
		{
			return $cep[0].$cep[1].$cep[2].$cep[3].$cep[4].'-'.$cep[5].$cep[6].$cep[7];
		}
	}

	/**
	 * Metodo formatoMoeda
	 *
	 * Coloca um numero no formato R$ 0,00
	 *
	 * @param Double|Float $valor
	 *
	 * @return Float
	 *
	 */
	public function formatoMoeda($valor)
	{
		//Procuramos se o valor monetÃ¡rio tem casa de milhar
		if(strstr($valor,"."))
		{
			$ponto_milhar = "";
		}
		else
		{
			$ponto_milhar = ".";
		}

		$retorno = "R$ ".number_format($valor,"2",",",$ponto_milhar);
		return $retorno;
	}

	/**
	 * Metodo isAjax
	 *
	 * Verifica se uma requisicao foi Realizada via AJAX
	 *
	 * @return boolean
	 *
	 */
	public function isAjax()
	{
		if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest")
		{
			return true;
		}
	}

	/**
	 * Metodo getPDOInstance
	 *
	 * Retorna uma Instancia da Classe PDO
	 *
	 * @return object
	 */
	public function getPDOInstance()
	{
		return new PDO(SGBD.":host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS );
	}

	/**
	 * Metodo soNumero
	 *
	 * Remove tudo que nao e numero
	 *
	 * @param string $parametro
	 *
	 * @return string
	 */
	public function soNumero($parametro)
	{
		//Remove o que não é digito
		$parametro = preg_replace('/\D/', "", $parametro);

		//Retorna o resultado
		return $parametro;
	}

	/**
	 * Metodo SqlNumero
	 *
	 * Formato um numero para ser gravado no banco de dados
	 *
	 * @param Double|Int|Float $number
	 *
	 * @return mixed
	 *
	 */
	public function SqlNumero($number)
	{
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = str_replace(".","",$number);
		$number = str_replace(",",".",$number);
		return $number;
	}

	/**
	 * Metodo Number
	 *
	 * Coloca um numero no formato 0,00
	 *
	 * @param Double|Float $number
	 * @return Double|Float
	 *
	 */
	public function Number($number)
	{
		//Verificamos se existe R$ no parametro
		if(strstr($number,"R$") != FALSE)
		{
			$number = trim(str_replace("R$","",$number));
		}
			
		$number = number_format($number,2,",","");
		return $number;
	}

	/**
	 * Metodo reduzir_string
	 *
	 * @param string $string
	 * @param int $fim
	 *
	 * @return string|unknown
	 *
	 */
	function reduzir_string($string, $fim)
	{
		if(strlen($string) > $fim)
		{
			$aux = substr($string, 0,$fim);
			$val = strrpos($aux," "); //busca o ultimo caracter com vazio
			$stringlimitada = substr($string,0,$val).'...';
			return $stringlimitada;
		}
		else
		{
			return $string;
		}
	}

	/**
	 * Metodo mask
	 *
	 * Retorna uma mascara de acordo com o parametro informado
	 *
	 * @param string $val
	 * @param string $mask
	 *
	 * @return string
	 */
	public function mask($val,$mask){

		$maskared = '';
		$k = 0;

		for($i = 0; $i<=strlen($mask)-1; $i++)

		{

		 if($mask[$i] == '#')

		 {

		 	if(isset($val[$k]))
		 	$maskared .= $val[$k++];
		 }
		 else
		 {
		 	if(isset($mask[$i]))

		 	$maskared .= $mask[$i];
		 }
		}
		return $maskared;
	}

	/**
	 * Metodo getMapSRC
	 *
	 * Extrai o valor do atributo SRC do Iframe do google MAPS
	 *
	 * @param string $mapIframe
	 *
	 * @return string
	 */
	public function getMapSRC($mapIframe)
	{
		//Pos inicial
		$initialpos = strpos($mapIframe,'src="')+5;

		//Extrai o src
		$mapIframe = substr($mapIframe,$initialpos);

		//pos final
		$finalpos =   strpos($mapIframe,'">');

		//Extrai o src
		$mapIframe = substr($mapIframe,0,$finalpos);

		//Retorna o SRC
		return htmlentities($mapIframe);
	}

	/**
	 * Metodo mesPorExtenso
	 *
	 * Recebe o mes em formato americano e converti para formato Brasileiro
	 *
	 * @param string $month
	 *
	 * @return string
	 */
	function mesPorExtenso($month)
	{
		switch ($month)
		{
			case "January":		$mes = 'Janeiro';     break;
			case "February":	$mes = 'Fevereiro';   break;
			case "March":		$mes = 'Março';       break;
			case "April":		$mes = 'Abril';       break;
			case "May":			$mes = 'Maio';        break;
			case "June":		$mes = 'Junho';       break;
			case "July":		$mes = 'Julho';       break;
			case "August":		$mes = 'Agosto';      break;
			case "September":	$mes = 'Setembro';    break;
			case "October":		$mes = 'Outubro';     break;
			case "November":	$mes = 'Novembro';    break;
			case "December":	$mes = 'Dezembro';    break;
		}
		return $mes;
	}

	/**
	 * Metodo exportaCsv
	 *
	 * Exporta para o formato csv
	 *
	 * @param string $resultado
	 * @param string $campos
	 *
	 * @return string
	 */
	function exportaCsv($resultado, $campos)
	{

		//MONTA CABEÇALHO DO PHP COM OS CAMPOS
		$data.= join(';', $campos)."\n";

		//POPULA
		foreach($resultado as $result)
		{
			$data.= join(';', $result)."\n";
		}

		//CABEÇALHOS
		header("Content-type: text/csv");
		header("Content-Disposition: attachment; filename=Registros.csv");
		header("Pragma: no-cache");
		header("Expires: 0");

		//OUPUT HEADERS
		echo $data;
	}

	/**
	 * Metodo escape_csv_value
	 *
	 * Tira as aspas simples e inclue aspas duplas
	 *
	 * @param string $value
	 *
	 * @return string
	 */
	function escape_csv_value($value)
	{
		echo $value;
		exit();
		$value = str_replace('"', '""', $value); // First off escape all " and make them ""
		if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
			return '"'.$value.'"'; // If I have new lines or commas escape them
		} else {
			return $value; // If no new lines or commas just return the value
		}
	}
}
?>