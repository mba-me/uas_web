<?php
include ("../config/dbConnect.php");
include ("../manager/UsersManagers.php");


if($_GET['action'] == "update") {

    $id= $_GET['id'];

    if( $_GET['step'] == "1"){

    header("Location:../views/edit.php?id=".$id."");

    } else if( $_GET['step'] == "2"){
        $nom = $_POST['First_name'];
        $prenom  = $_POST['Last_name'];
        $type        = $_POST['type'];
        $email      = $_POST['email'];
        $password        = $_POST['password'];
        $sex      = $_POST['sex'];
        $user = new UsersManagers();
        $user->update($nom, $prenom,$type, $email, $password, $sex, $id);
        header("Location:../views/edit.php?msg=succes_update");


    }

}

