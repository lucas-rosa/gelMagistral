<?php

/**
 * BaseWebsiteIdiomas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cod_id
 * @property string $txt_idioma
 * @property string $txt_meta
 * @property Doctrine_Collection $Contatos
 * @property Doctrine_Collection $Dicas
 * @property Doctrine_Collection $FaleConosco
 * @property Doctrine_Collection $Fotos
 * @property Doctrine_Collection $Manipulados
 * @property Doctrine_Collection $Noticias
 * @property Doctrine_Collection $ProdutosCategorias
 * @property Doctrine_Collection $Textos
 * @property Doctrine_Collection $TextosLayout
 * @property Doctrine_Collection $WebsiteInfo
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWebsiteIdiomas extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('websiteIdiomas');
        $this->hasColumn('cod_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('txt_idioma', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('txt_meta', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
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
        $this->hasMany('Contatos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Dicas', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('FaleConosco', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Fotos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Manipulados', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Noticias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('ProdutosCategorias', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('Textos', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('TextosLayout', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma'));

        $this->hasMany('WebsiteInfo', array(
             'local' => 'cod_id',
             'foreign' => 'cod_idioma_default'));
    }
}