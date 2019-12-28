
<?php

class UsersManagers{

 function connexion(){
 	return  new PDO('mysql:host=localhost;dbname=uas_web', 'root', 'Mariomarwen$$');
 }

 function findAll2(){
     $persos = [];
     $db= $this->connexion();
     $request = $db->query("select * from users where type='Enseignant'");
     while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
         $persos[] = $donnees;
     }
     return $persos;
    }
    
    function findAll1(){
        $persos = [];
        $db= $this->connexion();
        $request = $db->query("select * from users where type='Etudiant'");
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $persos[] = $donnees;
        }
        return $persos;
       }   

function add($nom,$prenom, $type, $email,$password){
    $db = $this->connexion();

    $q = $db->prepare('insert into users (nom,prenom,type,email,password) values (:nom,:prenom, :type, :email,:password)');
    $q->bindValue(":nom",$nom,PDO::PARAM_STR);
    $q->bindValue(":prenom",$prenom,PDO::PARAM_STR);
    $q->bindValue(":type",$type,PDO::PARAM_STR);
    $q->bindValue(":email",$email,PDO::PARAM_STR);
    $q->bindValue(":password",$password,PDO::PARAM_STR);

    $q->execute();
   
    }
    
 
function connecter($email, $password){
   $db= $this->connexion();
   $request = $db->query("SELECT * from users where email='".$email."' and password='".$password."'"); 
   return $request->fetch(pdo::FETCH_ASSOC);
  }

  function connecter1($email){
    $db= $this->connexion();
    $request = $db->query("SELECT * from users where email='".$email."'"); 
    return $request->fetch(pdo::FETCH_ASSOC);
   }
   function logout(){
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
   
}