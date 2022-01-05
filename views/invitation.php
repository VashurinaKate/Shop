<section class="registration center">
    <div class="registration__left">
        <a href="?action=auth&controller=user">Вход</a><br>
        <a href="?action=registration&controller=user">Регистрация</a>
        <?php
            if ($_GET['auth']) {
                include_once('authForm.php');
            } elseif ($_GET['reg']) {
                include_once('registrationForm.php');
            }
        ?>
    </div>
    <div class="registration__right">
        <p class="registration__heading">
            LOYALTY HAS ITS PERKS
        </p>
        <p class="registration__text">Get in on the loyalty program where you can earn points and unlock serious perks. Starting with these as soon as you join:</p>
        <ul class="registration__list">
            <li>15% off welcome offer</li>
            <li>Free shipping, returns and exchanges on all orders</li>
            <li>$10 off a purchase on your birthday</li>
            <li>Early access to products</li>
            <li>Exclusive offers & rewards</li>
        </ul>
    </div>
</section>
