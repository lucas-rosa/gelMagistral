<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// Verifique o caminho de acordo a versão baixada
//require 'system/Doctrine-1.2.3/Doctrine.php';
require 'system/Doctrine.compiled.php';

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));

//Compila o doctrine - fa�a este processo somente se o doctrine ainda n�o tiver sido compilado( somente o driver do banco usado � compilado )
//Doctrine_Core::compile('Doctrine.compiled.php',array('mysql'));

$manager = Doctrine_Manager::getInstance();

try {
  // Insira aqui os dados de sua conexão
  $conn = Doctrine_Manager::connection(SGBD."://".DB_USER.":".DB_PASS."@".DB_HOST."/".DB_NAME);

  $manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING,
Doctrine_Core::MODEL_LOADING_CONSERVATIVE);
  $manager->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

  $profiler = new Doctrine_Connection_Profiler();
  $manager->setListener($profiler);

} catch (Doctrine_Manager_Exception $e) {
  print $e->getMessage();
}

Doctrine_Core::loadModels(MODELS);

?>