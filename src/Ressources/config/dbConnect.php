<?php
try
{
    $db=new PDO('mysql:host=localhost;dbname=uas_web', 'root', 'Mariomarwen$$');
}
catch(PDOException $e)
{
    echo 'Error', $e->GetMessage();
}
?>