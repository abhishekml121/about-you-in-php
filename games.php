<?php
session_start();
 require_once('path.php');
$page_title = 'Games Page';
$header_title = "Games";
 require_once(HEADER_PATH);
if (empty($_SESSION['user_id'])):
 ?>
 <div>
<h2 style="color: red;border:1px dotted red;display: inline-block; padding: 10px;">You are not loged in. <span><a href="<?php echo '/'. raw_u(ROOT).'/paths/login.php#login_form'; ?>"  style="color: green">Login</a></span></h2>

 </div>
<?php endif;?>


<main>
<div id="my_games_div">
    <ul>
        <h1>Games -</h1>
        <li><h3>Dice game</h3><a href="<?php echo '/'. raw_u(ROOT).'/games/dice_game.html'; ?>"><img src="<?php echo '/'.ROOT . '/images/dice.svg'?>" alt=""></a></li>
        <li><h3>Backgound color game</h3><a href="<?php echo '/'. raw_u(ROOT).'/games/dragNdropGAME.html'; ?>"><img src="<?php echo '/'.ROOT . '/images/background.svg'?>" alt=""></a></li>

        <li><h3>Guess game</h3><a href="<?php echo '/'. raw_u(ROOT).'/games/random_game.html'; ?>"><img src="<?php echo '/'.ROOT . '/images/colors.svg'?>" alt=""></a></li>
        <li><h3>Snow man game</h3><a href="<?php echo '/'. raw_u(ROOT).'/games/snow_boll/index.html'; ?>"><img src="<?php echo '/'.ROOT . '/images/snowman.svg'?>" alt=""></a></li>

       
    </ul>
</div>    
    
    
</main>
<script>

</script>



<?php require_once(FOOTER_PATH); ?>
