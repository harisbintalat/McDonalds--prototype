<?php
$hostName = "127.0.0.1";
$dbName = "mcdonalds";
$userName = "fred";
$password = "zap";
try {
  $pdo = new PDO("mysql:host=$hostName;dbname=$dbName",$userName,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
   echo "Connection failed: " . $e->getMessage();
  }
?>
