<table class="table">

<thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
                    
                    $users = new UsersManagers();
                    foreach ($users->findAll2() as $user){
                    ?>
    <tbody>
    
      <tr>
        <td><?php echo $user['nom'] ?></td>
        <td><?php echo $user['prenom'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td> <a href="profile.php?id=<?php echo $user['id'] ?>">Voir profile</a></td>
      </tr>
    </tbody>
                    <?php } ?>
  </table>