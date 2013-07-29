<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteStats
 *
 * A tabela WebsiteStats foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\WebsiteStats
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class WebsiteStats extends BaseWebsiteStats {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteStats.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteStats ws";
    
    /**
     * Metodo ExecuteContagem
     * 
     * Faz uma contagem para verificar se um determinado COOKIE foi criado 
     * 
     */
    public function ExecuteContagem() {
        try {
            //Recebemos o ano
            $ano = date("Y");
            //Recebemos o mês
            $mes = date("m");
            //Recebemos a data atual
            //$data_atual = date("Y-m-d");
            $data_atual = date("Y-m-d");
            //Tempo de vida dos cookies
            $cookie_expire = time() + (24 * 3600);

            /* 	Verifica a data atual - se a data atual for diferente da data gravada no cookie então atualizamos o cookie
              [OU]
              se o cookie não existir então criamos um novo cookie
             */
            if (!isset($_COOKIE['COOKIE_DATE']) || $_COOKIE['COOKIE_DATE'] != $data_atual) {
                //Seta um novo cookie para gravar a data atual com duração de 1 dia
                setcookie('COOKIE_DATE', date("Y-m-d"), $cookie_expire);
            }

            //Verifica se o ip foi gravado no cookie
            if (!isset($_COOKIE['VISITOR_IP'])) {
                //Seta um novo cookie com duração de 1 dia
                setcookie('VISITOR_IP', $_SERVER['REMOTE_ADDR'], $cookie_expire);
            }

            //Verifica se o site não foi visitado ainda
            if (!isset($_COOKIE['VISITA_REGISTRADA'])) {
                //Registra uma flag indicando que a visita ja foi contabilizada
                setcookie('VISITA_REGISTRADA', true);
            }

            //Verificamos se já existe um registro que está contando as estatísticas do mês e ano atuais
            $recordset = $this->verificarMesAno($ano, $mes);

            //Verifica o resultado
            if ($recordset === false) {
                //Insere um novo registro do mês e ano atuais
                $this->insereNovoRegistro($data_atual);
            } else {
                //atualiza a contagem
                $this->atualizaContagem($recordset[0], $data_atual);
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo insereNovoRegistro
     * 
     * Cadastra na tabela websiteStats um novo registro 
     * 
     * @param string $data_atual
     */
    private function insereNovoRegistro($data_atual) {
        //Atribuimos os valores na Classe
        $this->num_visitas = 1;     //Incrementa uma visita( novo acesso/visita ao site )
        $this->page_views = 1;     //Incrementa uma page view( nova pagina acessada no site )
        $this->data = $data_atual;  //Insere a data atual no registro
        $this->num_visitantes = 1;     //Incrementa um novo visitante( com ip diferente )
        //Salva o registro no banco de dados
        $this->save();
    }
    
     /**
     * Metodo atualizaContagem
     * 
     * Atualiza na tabela websiteStats um registro existente conforme o cod_id 
     * passado por parametro.  
     * 
     * @param string $recordset
     * @param string $data_atual 
     */
    private function atualizaContagem($recordset, $data_atual) {
        //Recebe o registro a ser atualizado
        $registro = $this->getTable($this->table_alias)->find($recordset['cod_id']);

        //Atribuimos os valores na Classe
        //Verifica a flag para avaliar se a visita deve ser contabilizada
        if (!($_COOKIE['VISITA_REGISTRADA'] == true)) {
            //Incrementa uma visita( novo acesso/visita ao site )
            $registro->num_visitas = $registro->num_visitas + 1;
        }

        $registro->page_views = $registro->page_views + 1; //Incrementa uma page view( nova pagina acessada no site )
        $registro->data = $data_atual; //Atualiza a data

        /*
          Se o IP atual for diferente do IP gravado no cookie então devemos contabilizar o visitante, pois entrou uma nova maquina
          [OU]
          Se a data atual for diferente da data gravada no cookie
         */
        if (($_SERVER['REMOTE_ADDR'] != $_COOKIE['VISITOR_IP']) || ($_COOKIE['COOKIE_DATE'] != $data_atual)) {
            //Incrementa um novo visitante( com ip diferente )
            $registro->num_visitantes = $registro->num_visitantes + 1;
        }

        //Salva o registro no banco de dados
        $registro->save();
    }
    
     /**
     * Metodo atualizaContagem
     * 
     * Seleciona os dados da tabela  websiteStats conforme o ano e o mes 
     * passados porparametro.
     * 
     * @param string $ano
     * @param string $mes
     * @return string 
     */
    private function verificarMesAno($ano, $mes) {
        try {
            //Monta a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('(month(data) = ? and year(data) = ?)', array($mes, $ano))
                    ->limit('1');

            //Verifica se houve resultado
            if ($query->count() > 0) {
                //Executa a query
                $recordset = $query->execute()->toArray();

                //Retorna o id do registro encontrado
                return $recordset;
            } else {
                //Nenhum registro encontrado
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}