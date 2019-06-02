<?php
session_start();
 require_once('../path.php'); 
$page_title = 'profile';
$header_title = "Your Profile";

/*Store register_id in Session
 then fetch all the details coressponding to that register_id
and store it in a new assoc array..
*/

?>
<?php require_once(HEADER_PATH); ?><br>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a>

<?php
if (empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/paths/login.php');
  exit();
}

?>

<?php

/* => When any user successfuly sign in, then it automatically assigned a new register_id (unique id for each user) that id will store as session variable (as coded in register.php file))

=> so in here we're using that session variable to initialize $user_id*/

 $user_id = $_SESSION['user_id'];
 $user_detail = find_account_by_id($user_id);
 // echo "<pre>";
 // print_r($user_detail);
 // echo "</pre>";

 echo "<br> User id : {$user_id} <br><br><br><br>";
  ?>

    <section id="view_profile">

    <div class="common" id="show_profile">
      <aside id="left_aside"><img src="<?php echo '/'. ROOT.'/uploads/'.$user_detail['profile_pic']; ?>" alt="">
        </aside>
      <aside id="right_aside">
        <table>
          <?php
          foreach ($user_detail as $key => $value) {
            $detail = "<tr><th>";        
            $detail .= ucfirst(str_replace('_', " ", $key));
            $detail .= "</th><td>";        
            $detail .= "{$value} </td></tr>";
            echo $detail;
              }

           ?>
        </table>
    </aside>
        
    </div>
</section>

<?php require_once(FOOTER_PATH); ?><br>
