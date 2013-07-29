<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoGeralVinculo
 *
 * A tabela PermissaoGeralVinculo foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\PermissaoGeralVinculo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PermissaoGeralVinculo extends BasePermissaoGeralVinculo {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoGeralVinculo. Para isso utilize o elias pgv.
     * 
     * @var string $table_alias
     */
    private $table_alias = "permissaoGeralVinculo pgv";
    
     /**
     * Metodo SelectPermissoesVinculadas
     * 
     * Seleciona os dados da tabela PermissaoGeralVinculo conforme $Controller_acao
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $controller_acao
     * @return string[]
     * 
     */
    public function SelectPermissoesVinculadas($controller_acao) {
        $array = array();

        foreach ($controller_acao as $key => $checado) {
            $tabela = $this->getTable($this->table_alias)->findByDql('cod_id_relacao = ? ', array($checado));
            $dados = $tabela[0]->toArray();

            if (!empty($dados['cod_id_relacionado'])) {
                $array[$key] = $dados['cod_id_relacionado'];
            }
        }

        //retorna um arrei mas se tiver valores iguais s� retorna um valor dos duplicados
        return array_unique($array);
    }
    
    public function selecionarPermissoesVinculadas($controller_acao){
        //Array que recebará as permissoes
        $array = array();
        
        //O contador, será o ponto de partida do indice do array que será formado, para que este array possa se juntar com o outro array de permissoes no concrete
        $contador = count($controller_acao) ;
        
        //Percorre as permissoes
        foreach ($controller_acao as $key => $checado) {
            //verifica se existe dependencia para essa permissao
            $query = Doctrine_Query::create()
                    ->select('pgv.*')
                    ->from($this->table_alias)
                    ->where('pgv.cod_id_relacao = ?', $checado)
                    ->execute()
                    ->toArray();

            //Se a query for maior que 0, significa que exite uma ou mais dependencias, entao essas vao ser adicionadas ao array
            if (count($query) > 0) {
                foreach($query as $key => $valor_query){
                    $array[$contador] = $valor_query['cod_id_relacionado'] ; 
                    $contador++ ;
                }
            }
        }
        //retorna um arrei mas se tiver valores iguais s� retorna um valor dos duplicados
        return array_unique($array);
    }

}