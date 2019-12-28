<?php
session_start();
include "../config/dbConnect.php";
include "../manager/UsersManagers.php";
$_SESSION['email']="";


if($_GET['action'] == 'connexion')

{   
    $email      = $_POST['username'];
    $password        = $_POST['password'];
   
    $manger = new UsersManagers();
    $res=$manger->connecter($email,$password);

    
if($res){
    header("Location:../views/home.php");
    $_SESSION['email']=$email;}
else {
	header("Location:../views/login.php?msg=error");
   }
   
}
else if($_GET['action'] == "deconnexion") {
    $user = new UsersManagers();
    $user->logout();
    header("location: ../views/login.php");
}