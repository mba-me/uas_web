<?php
session_start();
include "../config/dbConnect.php";
include "../manager/UsersManagers.php";
?>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>Modifier Utilisateur</span>
    </div>

    <?php
    //$users = new UsersManagers();
    $id = @$_GET['id'];
    $users = new UsersManagers();
    $user = $users->findByID($id);
    ?>
    <div class="mws-panel-body no-padding">
       

        <form method="POST" id="signup-form" class="signup-form  validate-form" action="../control/userCtr.php?action=update&id=<?php echo $user['id'];?>&step=2">
        <?php if(@$_GET['msg']=="succes_update"){?>
                <div class="mws-form-message success">
                        modification avec Succes
                </div>
            <?php }?>
                        <div class="form-group validate-input" data-validate = "Enter First Name">
                            <input type="text" class="form-input " value="<?php echo $user['first_name'];?>" name="First_name" id="name" />
                        </div>
                        <div class="form-group validate-input" data-validate = "Enter Last Name">
                            <input type="text" class="form-input" name="Last_name" value="<?php echo $user['Last_name'];?>" id="name" />
                        </div>

                        <div class="form-group validate-input" data-validate = "Enter Your Type">
                            <select class="custom-select" name="type" value="<?php echo $user['type'];?>" id="type"  >
                            <option selected class="form-input" >Your type</option>
                            <option value="Etudiant">Etudiant</option>
                            <option value="Enseignant">Enseignant</option>
                            </select>
                        </div>
                        <div class="form-group validate-input" data-validate = "Enter Your Email">
                            <input type="email" class="form-input" name="email" value="<?php echo $user['email'];?>" id="email" />
                        </div>
                        <div class="form-group validate-input" data-validate = "Enter password">
                            <input type="text" class="form-input"  name="password" value="<?php echo $user['password'];?>" id="password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group validate-input" data-validate = "Enter re-password">
                            <input type="password" class="form-input" name="re_password" value="<?php echo $user['re_password'];?>" id="re_password" />
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Save"/>
                        </div>
                    </form>
    </div>
</div>
