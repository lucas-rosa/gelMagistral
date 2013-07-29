<?php
//a sess�o expirar em 30 minuros
session_cache_expire(30);
//Inicializa a Sess�o
session_start();
//Cabe�alho para Tratamento de Acentua��o
header("Content-Type: text/html; charset=ISO-8859-1", true);
//Carregamento Autom�tico de Classes
include('system/loader/loader.php');
//Carrega o BOOTSTRAP
include(MODELS."bootstrap.php");
//Arquivo de Fun��es Gen�ricas do Framework
include('system/util/functions.util.php');

//Instancia a classe de carregamento
$AutoLoader = new ClassAutoloader();
//Temos uma �nica instancia que gerencia todo o sistema
$initializer = new initializer();
?>