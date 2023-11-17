<?php 
try 
{
$strConnection='mysql:host=localhost;dbname=amphi2';
$pdo=new PDO($strConnection,'root','root');

}catch (PDOException $e)
{
$msg='ERROR PDO ON '. $e->getMessage();
die($msg);
}
?>