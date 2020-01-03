
<?php

class UsersManagers{

 function connexion(){
 	return  new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
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
       
 function findByID($id_user){
        $db = $this->connexion();
        $query=$db->prepare("SELECT * FROM users WHERE id=:param");
        $query->bindParam(':param', $id);
        $query->execute();
   
        $result = $query -> fetch();
        return $result;
    }

    function update($nom, $prenom,$type, $email, $password, $sex, $id){

        $db = $this->connexion();
        $q = $db->prepare('update users set nom=:first_name,prenom=:last_name,type=:type,email=:email,password=:password,sex=:sex WHERE id=:id ');
        $q->bindValue(":first_name",$nom,PDO::PARAM_STR);
        $q->bindValue(":last_name",$prenom,PDO::PARAM_STR);
        $q->bindValue(":type",$type,PDO::PARAM_STR);
        $q->bindValue(":email",$email,PDO::PARAM_STR);
        $q->bindValue(":password",$password,PDO::PARAM_STR);
        $q->bindValue(":sex",$sex,PDO::PARAM_STR);
        $q->bindParam(':id', $id);
        $q->execute();

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

  function connecter1($id){
    $db= $this->connexion();
    $request = $db->query("SELECT * from users where id='".$id."'"); 
    return $request->fetch(pdo::FETCH_ASSOC);
   }
   function connecter2($email){
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