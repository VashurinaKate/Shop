<?php
session_start();
?>
<section class="registration center">
    <p><?=$info?>, <?=$email?></p>
    <h1>Welcome, <?=$_SESSION['email']?></h1>
    <div>
        <?php
        foreach ($userData as $user): ?>
        <p>Name: <?=$user['name']?></p>
        <p>Last Name: <?=$user['surname']?></p>
        <p>Email: <?=$user['email']?></p>
        <?php endforeach; ?>
    </div>
    
    <a href="?action=logout&controller=user">Logout</a>
</section>
