<?php
include "../config/dbConnect.php";
include "../manager/UsersManagers.php";

if(isset($_POST['submit']))
{
    if(!empty($_POST['First_name']) AND !empty($_POST['Last_name']) AND !empty($_POST['type']) AND !empty($_POST['password']) AND !empty($_POST['re_password']) )
    {
        if($_GET['action'] == "add"){

            $nom = $_POST['First_name'];
            $prenom  = $_POST['Last_name'];
            $type  = $_POST['type'];
            $email      = $_POST['email'];
            $password        = $_POST['password'];
            $user = new UsersManagers();
            $user->add($nom,$prenom, $type, $email,$password);
            header("Location:../views/login.php?msg=success");
            }
    }
   else
    {
        header("Location:../views/login.php");

    } 

}