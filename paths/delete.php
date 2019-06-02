<?php
session_start();

require_once('../path.php'); 
$page_title = 'Delete Your Account';
$header_title = "Delete Account";

// $count_for_delete_button = $_SESSION['count'];

if(empty($_SESSION['user_id'])){
redirect_to('/'.ROOT.'/paths/login.php');
}

?>
<?php require_once(HEADER_PATH); ?><br>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>

   <?php

   if(is_post_request()){
     // modal_box_for_delete_accout();
     $_SESSION['count']++;

if ($_SESSION['count'] > 0) {
  
  $user_id = $_SESSION['user_id'];
  $result = delete_account($user_id);
  if($result === true){
    $_SESSION['user_id'] = null;
    $_SESSION['first_name'] = null;
    $_SESSION['count'] = null;
    
    sleep(2);
redirect_to('/'.ROOT.'/index.php');
  }
}
}
else{

    echo "<big><b>PRESS<span class='span_for_common'> 3 times</span> 'Delete Your Account' button to delete your Account.</b></big>";
  }

echo "<br><br>";
echo "Are you really want to DELETE your Account<br><br>Your Name : {$_SESSION['first_name']}<br><br>";
echo "<p id='count_button_pressed'>Button pressed : 0 times </p>";

?>

    <section id="delete_account">

    <div class="border">
        <div id="delete_account_div">
          
           <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="delete_account_form">
          <button id="delete_button">Delete Your Account</button>
        </form>
        <span id="delete_button_color">>>></span>

        </div>

        <!-- modal  box-->

          <div id="myModal" class="modal">

  
  <div class="modal-content">
   
    <div class="modal-body">
     <div class="loader"></div>
    </div>
    
  </div>

</div>




        <?php
        $s ="<script>";
        $s .="let count_button_pressed = document.getElementById('count_button_pressed');
        let show_color = document.getElementById('delete_button_color');";
        $s .="let button = document.getElementById('delete_button');";
  
    
  $s .="</script>";
  echo "$s";

  $s2 = "<script>";
  $s2 .= "let c = 0;
        sessionStorage.setItem('count', c);

  function inc_width(e){c++;
    if(c == 4){
      var modal = document.getElementById('myModal');
      modal.style.display = 'block';
    }
    sessionStorage.setItem('count', c);
    if(sessionStorage.getItem('count') < 4){
      console.log(sessionStorage.getItem('count'));
      show_color.style.backgroundColor = 'red';
      show_color.style.width = sessionStorage.getItem('count') * 33 + '%';count_button_pressed.innerHTML = 'Button pressed :<span class=\'span_for_common\'><b> ' + c + '</b> times </span>';
      if(sessionStorage.getItem('count') == 3){
        show_color.textContent = 'only one more PRESS';
      }
     e.preventDefault();}
     ";
    $s2 .=";
     }
  button.addEventListener('click', inc_width, false);";
$s2 .="</script>";
echo $s2;

        ?>
    </div>
</section>

<?php include(FOOTER_PATH); ?><br>
