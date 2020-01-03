<?php
try
{
    $db=new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
}
catch(PDOException $e)
{
    echo 'Error', $e->GetMessage();
}
?>