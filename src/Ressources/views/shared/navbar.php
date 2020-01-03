<?php
session_start();
include "../../config/dbConnect.php";
include "../../manager/UsersManagers.php";
?>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container" style="height:65px">
        <a href='home.php'>
            <img src="../../../web/img/logo.png" style="margin-top:50px ; border: 2px solid ; border-radius: 50px ; width: 80px ;  margin-right:5px;">
        </a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top" ></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                    if ($curPageName != 'profile.php') {

                        ?>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                               href="#portfolio">ESPACES</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
                        </li>
                <li class="name-user">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
                        <?php
                        $manger = new UsersManagers();
                        $res=$manger->connecter1($_SESSION['id']);


                        if($res){
                            echo $res['nom']."  ".$res['prenom'];
                        }

                        ?>
                    </a>
                </li>

                <div class="dropdown">
                    <img src="https://demo.bootstrap.news/bootnews/assets/img/avatar/avatar1.png" alt="Circle Image" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="avatar-lg rounded-circle img-fluid logo-user" data-toggle="tooltip" data-placement="bottom">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button"><a href='profile.php?id=<?php echo $res['id'] ?>'>Profile</a></button>
                        <button class="dropdown-item" type="button"><a href='../edit.php'>Settings</a></button>
                        <button class="dropdown-item" type="button"><a href="../control/loginCtr.php?action=deconnexion">Log out</a></button>
                    </div>
                </div>
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#"></a>
                </li>
            </ul>
        </div>
        <?php
        }
        ?>
    </div>
</nav>