<?php

/**
 * BaseCepUf
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property string $cha_sigla
 * @property string $txt_uf
 * @property Doctrine_Collection $CepCidades
 * @property Doctrine_Collection $Contatos
 * @property Doctrine_Collection $LojaClientes
 * @property Doctrine_Collection $LojaPedidos
 * @property Doctrine_Collection $PedidoOnline
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCepUf extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('cepUf');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cha_sigla', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             'fixed' => true,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_uf', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('CepCidades', array(
             'local' => 'cod_id',
             'foreign' => 'cod_uf'));

        $this->hasMany('Contatos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_estado'));

        $this->hasMany('LojaClientes', array(
             'local' => 'cod_id',
             'foreign' => 'cod_uf'));

        $this->hasMany('LojaPedidos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_uf_entrega'));

        $this->hasMany('PedidoOnline', array(
             'local' => 'cod_id',
             'foreign' => 'cod_uf_entrega'));
    }
}