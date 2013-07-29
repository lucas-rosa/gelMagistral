<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Contatos
 *
 * A tabela Contatos foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Contatos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Contatos extends BaseContatos {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela contatos. Para isso utilize o elias co.
     * 
     * @var string $table_alias
     */
    private $table_alias = "contatos co";
    
    /**
     * Metodo SelectContatosIdDetalhes
     * 
     * Seleciona os dados da tabela Contatos conforme o cod_relacao_idioma passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_relacao_idioma
     * @return string[]
     */
    public function SelectContatosIdDetalhes($cod_relacao_idioma) {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('co.*, cc.txt_cidade, cu.txt_uf, wi.txt_idioma')
                    ->from($this->table_alias)
                    ->innerJoin("co.CepCidades cc")
                    ->innerJoin("co.CepUf cu")
                    ->innerJoin("co.WebsiteIdiomas wi")
                    ->where('co.cod_relacao_idioma = ?', $cod_relacao_idioma);

            //Verifica se houve resultado
            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo ExecuteEditaContatos
     * 
     * Edita os dados da tabela Contatos conforme o cod_id passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @param integer $total
     * @return boolean
     */
    public function ExecuteEditaContatos($parametros, $total) {
        try {

            //Pesquisa o id
            $tabela = $this->getTable()->find($parametros['cod_id'.$total]);

            //Verifica se o registro foi localizado
            if ($tabela) {
                $tabela->txt_razao_social = $parametros['txt_razao_social'.$total];
                $tabela->txt_cnpj = $parametros['txt_cnpj'.$total];
                $tabela->txt_endereco = $parametros['txt_endereco'.$total];
                $tabela->txt_numero = $parametros['txt_numero'.$total];
                $tabela->txt_complemento = stripslashes($parametros['txt_complemento'.$total]);
                $tabela->txt_cep = stripslashes($parametros['txt_cep'.$total]);
                $tabela->txt_bairro = $parametros['txt_bairro'.$total];
                $tabela->cod_estado = $parametros['cod_estado'.$total];
                $tabela->cod_cidade = $parametros['cod_cidade'.$total];
                $tabela->txt_telefone = $parametros['txt_telefone'.$total];
                $tabela->txt_pais = $parametros['txt_pais'.$total];
                $tabela->cod_latitude = stripslashes($parametros['cod_latitude'.$total]);
                $tabela->cod_longitude = stripslashes($parametros['cod_longitude'.$total]);

                //Atualiza o banco de dados
                $tabela->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'.$total], 'A');

                //Retorna true em caso de sucesso
                return true;
            } else {
            	
            	$this->cod_idioma = $parametros['cod_idioma'.$total];
                $this->cod_relacao_idioma = $parametros['cod_relacao_idioma'.$total];
                $this->txt_razao_social = $parametros['txt_razao_social'.$total];
                $this->txt_cnpj = $parametros['txt_cnpj'.$total];
                $this->txt_endereco = $parametros['txt_endereco'.$total];
                $this->txt_numero = $parametros['txt_numero'.$total];
                $this->txt_complemento = $parametros['txt_complemento'.$total];
                $this->txt_cep = $parametros['txt_cep'.$total];
                $this->txt_bairro = $parametros['txt_bairro'.$total];
                $this->cod_estado = $parametros['cod_estado'.$total];
                $this->cod_cidade = $parametros['cod_cidade'.$total];
                $this->txt_telefone = $parametros['txt_telefone'.$total];
                $this->txt_pais = $parametros['txt_pais'.$total];
                $this->cod_latitude = $parametros['cod_latitude'.$total];
                $this->cod_longitude = $parametros['cod_longitude'.$total];
                $this->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'A');

                return true;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectContatosEditar
     * 
     * Seleciona os dados da tabela Contatos a serem editados conforme o cod_relacao_idioma
     * e o $cod_idioma passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_relacao_idioma
     * @param integer $cod_idioma
     * @return string[]
     */
    public function SelectContatosEditar($cod_relacao_idioma, $cod_idioma) {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('co.*, cc.txt_cidade, cu.txt_uf, wi.txt_idioma')
                    ->from($this->table_alias)
                    ->innerJoin("co.CepCidades cc")
                    ->innerJoin("co.CepUf cu")
                    ->innerJoin("co.WebsiteIdiomas wi")
                    ->where('co.cod_relacao_idioma = ?', $cod_relacao_idioma)
                    ->andWhere('co.cod_idioma = ?', $cod_idioma)
                    ->limit(1);

            //Verifica se houve resultado
            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}