<?php
session_start();
 require_once('../path.php');
$page_title = 'Login';
$header_title = "Login Page";
?>
<?php require_once(HEADER_PATH);?><br>
<?php
if (!empty($_SESSION['user_id'])) {
redirect_to('/'.ROOT.'/paths/profile.php');
}
?>
<?php
if(is_post_request()) {
  $login = [];
  $login_errors = [];
  $login['first_name'] = $_POST['first_name'] ?? '';
  $login['middle_name'] = $_POST['middle_name'] ?? '';
  $login['last_name'] = $_POST['last_name'] ?? '';
  $login['password'] = $_POST['password'] ?? '';
  $account_by_name = find_account_by_name($_POST['first_name']);
  $login_errors_function = check_login_errors($login, $account_by_name);

  display_login_errors($login_errors_function);
  echo "<br>";

}/* end of if(is_post_request())*/
else{
  $login['first_name'] ='';
  $login['middle_name'] ='';
  $login['last_name'] = '';
  $login['password'] = '';
}
?>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>

<section id="login">
   
    <div class="border">
       <div id="login_image"></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login_form">
            <div class="label_div"><label for="first_name">First Name : </label><input type="text" id="first_name" name="first_name" value="<?php echo h($login['first_name']); ?>" required></div>

                <div class="label_div"><label for="middle_name">Middle Name : </label><input type="text" id="middle_name" name="middle_name" value="<?php echo h($login['middle_name']); ?>"></div>

                <div class="label_div"><label for="last_name">Last Name : </label><input type="text" id="last_name" name="last_name" value="<?php echo h($login['last_name']); ?>"></div>
                
                <div class="label_div"><label for="password">Password : </label><input type="password" id="password" name="password" value="<?php echo h($login['password']); ?>" required></div>

               
            <br><br>
             
              <div id="login_submit">
               <input type="submit" value="" /></div>

        </form>
    </div>
    
</section>



<?php require_once(FOOTER_PATH); ?><br>
