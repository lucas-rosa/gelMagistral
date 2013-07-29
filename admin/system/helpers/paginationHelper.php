<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe paginationHelper
 * 
 * Helper para auxiliar na construcao de paginacoes
 * 
 * @package admin\system\helpers\paginationHelper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 *
 */

class paginationHelper {

    /**
     * Numero de paginas por sessao
     * 
     * @var Integer $num_paginas_por_sessao
     */
    private $num_paginas_por_sessao = 4;

    /**
     * Metodo create
     * 
     * Cria a paginacao dos dados
     * 
     * @param Doctrine_Query $doctrine_query - objeto DOCTRINE_QUERY a ser paginado
     * @param Integer $pagina_atual - pagina acessada no momento
     * @param Integer $registros_por_pagina - quantidade de registros por cada pagina
     * @param String $url_default - url padrao a ser acessada na paginacao
     * @param array $url_params - parametros da requisicao a serem agregados na URL da paginacao (Parametros GET/POST)
     * 
     * @return multitype:string Ambigous <Ambiguous, Doctrine_Query> 
     */
    public function create(Doctrine_Query $doctrine_query, $pagina_atual, $registros_por_pagina, $url_default, Array $url_params = null) {


        //Trata a entrada do usuário - removendo tudo que não é digito
        $pagina_atual = (!is_null($pagina_atual) ? HelperFactory::getInstance()->soNumero($pagina_atual) : 1);

        //Valida a entrada da página atual
        if (is_numeric($pagina_atual)) {

            //Cria a paginação visual
            $view_pagination = $this->paginateView($doctrine_query, $pagina_atual, $registros_por_pagina);
            //Cria a paginação no banco de dados
            $doctrine_query = $this->paginateDB($doctrine_query, $pagina_atual, $registros_por_pagina, $view_pagination);

            //Verifica se a paginação foi criada
            if ($view_pagination !== false) {

                //Define a url padrão da paginação
                $view_pagination['url_default'] = $this->defineDefaultURL($url_default, $url_params);
            }

            //Retorna o resultado
            return array('doctrine_query' => $doctrine_query, 'view_pagination' => $view_pagination);
        } else {

            //Retorna os registros limitados apenas ao numero de registros por página
            $doctrine_query->limit($registros_por_pagina);

            //Retorna o resultado
            return array('doctrine_query' => $doctrine_query, 'view_pagination' => false);
        }
    }
    
    /**
     * Metodo paginateView
     * 
     * Executa a paginacao visual
     * 
     * @param Doctrine_Query $QueryObject - objeto DOCTRINE_QUERY a ser paginado
     * @param Integer $pagina_atual - pagina acessada no momento
     * @param Integer $registros_por_pagina - quantidade de registros por cada pagina
     * 
     * @return multitype:string Ambigous <Ambiguous, Doctrine_Query> 
     */
  
    private function paginateView(Doctrine_Query $QueryObject, $pagina_atual, $registros_por_pagina) {

        try {

            //Recebe o total de registros
            $total_registros = $QueryObject->count();

            //Verifica se a paginação é necessária
            if ($total_registros > $registros_por_pagina) {
                //Calcula o total de paginas
                $total_paginas = ceil($total_registros / $registros_por_pagina);

                //Verifica se o usuário esta solicitando uma página que não existe
                if ($pagina_atual > $total_paginas) {

                    //Retorna falso, pois a página solicitada não existe
                    return false;
                } else {

                    //Calcula a sessão anterior de páginas
                    if (($pagina_atual - $this->num_paginas_por_sessao) < 1)
                        $anterior = 1;
                    else
                        $anterior = $pagina_atual - $this->num_paginas_por_sessao;

                    //Calcula a sessão posterior de páginas
                    if (($pagina_atual + $this->num_paginas_por_sessao) > $total_paginas)
                        $posterior = $total_paginas;
                    else
                        $posterior = $pagina_atual + $this->num_paginas_por_sessao;

                    //Retorna o resultado final da paginação
                    return array(
                        'total_rows' => $total_registros,
                        'total_pages' => $total_paginas,
                        'current_page' => $pagina_atual,
                        'prev' => $anterior,
                        'next' => $posterior);
                }
            }else {

                //Paginação não necessária
                return false;
            }
        } catch (Doctrine_Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * Metodo paginateDB
     * 
     * Executa a paginacao no banco de dados
     * 
     * @param Doctrine_Query $QueryObject
     * @param Integer $pagina_atual
     * @param Integer $registros_por_pagina
     * @param string $dados_paginacao
     * 
     * @return Ambiguous
     */
    private function paginateDB(Doctrine_Query $QueryObject, $pagina_atual = null, $registros_por_pagina, $dados_paginacao) {

        //Verifica se a página foi informada e se a paginação foi criada com sucesso
        if (!is_null($pagina_atual) && $dados_paginacao !== false) {

            //Calcula a proxima paginação	  
            $pagina_atual = ($pagina_atual * $registros_por_pagina) - $registros_por_pagina;
        } else {
            //Página inicial
            $pagina_atual = 0;
        }

        //Aplica a paginação no objeto da Query
        $QueryObject->offset($pagina_atual)
                ->limit($registros_por_pagina);

        //Retorna a Query paginada
        return $QueryObject;
    }

    /**
     * Metodo defineDefaultURL
     * 
     * Verifica os parametros informados e retorna a url padrao da paginacao
     * 
     * @param String $url_padrao
     * @param array  $ArrayData
     */
    private function defineDefaultURL($url_padrao, Array $ArrayData = null) {

        //Verifica se haverá parãmetros na URL
        if (!is_null($ArrayData)) {

            //Verifica se ArrayData é um Array
            if (is_array($ArrayData) && count($ArrayData) > 0) {

                //Recebe os parâmetros do Htaccess
                $parametros = Htaccess::Create();

                //Recebe os parâmetros via GET/POST
                $parametros = array_merge($parametros['params'], $_POST);

                //URL de parâmetros
                $url_parameters = "";

                //Percorre o array de parâmetros
                foreach ($parametros as $chave => $valor) {

                    //Verifica se a chave existe nos parametros inforamdos E se a mesma possui um valor
                    if (array_search($chave, $ArrayData) !== false && strlen(trim($valor)) > 0) {

                        //Adiciona o parâmetro na URL
                        $url_parameters .= $chave . "/" . $valor . "/";
                    }

                    //Verifica se ha valores a procurar nos parametros informados
                    if (next($parametros) === false) {

                        //Interrompe o laço foreach indicando que acabou a busca de parâmetros
                        break;
                    }
                }
            }
        }

        //Adiciona a url absoluta do dominio
        $url_padrao = DEFAULT_URL . $url_padrao;

        //Monta a URL FINAL e retorna
        return (isset($url_parameters) ? $url_padrao . "/" . $url_parameters : $url_padrao . "/");
    }

}

?>