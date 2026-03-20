<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>TP2 - ex2</title>
    <link rel="icon" type="image/png" href="iconPHP.png">
  </head>
<h2>  </h2>
<?php
class Connexion {
// les attributs static caractéristiques de la connexion
static private $hostname = 'localhost';
static private $database = 'stikken'; // votre id court
static private $login ='stikken'; // votre id court
static private $password = 'uSInb3MMJU6x'; // votre mdp
static private $tabUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
// l'attribut static qui matérialisera la connexion
static private $pdo;
// le getter public de cet attribut
static public function pdo() {return self::$pdo;}
// la fonction static de connexion qui initialise $pdo et lance la tentative de connexion
static public function connect() {
$h = self::$hostname; $d = self::$database; $l = self::$login; $p = self::$password; $t = self::
$tabUTF8;
try {
self::$pdo = new PDO("mysql:host=$h;dbname=$d",$l,$p,$t);
self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "erreur de connexion : ".$e->getMessage()."<br>";
} } }
?>
  <body>
  </body>
</html>
