<?php 
session_start();
require_once('../path.php');

if(!isset($_GET['id']) || empty($_GET['id'])){
    redirect_to('/'.ROOT.'/paths/my_contacts.php');
}
/*user can't go to collections page, if he is not loggedin*/
if (empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/paths/login.php');
}else{
  $user_id = $_SESSION['user_id'];
  $update_this_id = $_GET['id'];
  $your_details = find_contact_by_id($update_this_id);


echo "------$user_id-----";
echo "<pre>";
print_r($your_details);
echo "</pre>";

}

$page_title = 'My Contacts';
$header_title = "My Contacts";
?>
<?php require_once(HEADER_PATH);

?><br>

<?php

if(is_post_request()) {
  $your_details = [];
  $your_details['id'] = $update_this_id;
  echo "{$your_details['id']}";

  $errors=[];
  // for profile_pic process
  // Valid file extensions for profile_pic
  

  $your_details['name'] = $_POST['name'] ?? '';
  $your_details['mobile'] = $_POST['mobile'] ?? '';
  $your_details['email'] = $_POST['email'] ?? '';
  $your_details['dob'] = $_POST['dob'] ?? '';
  
  $your_details['address'] = $_POST['address'] ?? '';
  
  $your_details['about'] = $_POST['about'] ?? '';

   $check_update_contacts_errors_function = contacts_check_errors($your_details, $errors);

  if (empty($check_update_contacts_errors_function)) {
  $result = update_contacts($your_details);
  if($result === true){
    
 
    redirect_to('/'.ROOT.'/paths/my_contacts.php');
  }
}

} else{
    $errors= [];
    $check_update_contacts_errors_function ='';
}


/*echo "-----------";
echo "<pre>";
print_r($contact_set);
echo "</pre>";*/

?>

<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>


<section id="collections">

    <?php
    require_once(FILE_FOLDER.'/includes/left_aside.php');
     ?>

    <aside class="right_aside_collections">

        <div>


    <h1>Contact</h1>
   

<br><br>
    

    
    <div id="edit_contact_div">
<?php echo display_errors($errors); ?>
<form id="contacts-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <div id="close_button_for_song">
    <span class="closee_song"><a href="<?php echo '/'. raw_u(ROOT).'/paths/my_contacts.php'; ?>">&times;</a></span>
    </div>
    <div id="div_inside_contact_form">
    <div class="item text">
        <label>Name:</label>
        <div class="field"><input type="text" name="name" value='<?php echo "{$your_details['name']}"?>' /></div>
    </div>
    <div class="item text">
        <label>Mobile:</label>
        <div class="field"><input type="text" name="mobile" value='<?php echo "{$your_details['mobile']}"?>' /></div>
    </div>
    <div class="item text">
        <label>Email:</label>
        <div class="field"><input type="text" name="email" value='<?php echo "${your_details['email']}"?>'  /></div>
    </div>

    <div class="item text">
        <label>DOB:</label>
        <div class="field"><input type="text" name="dob" value='<?php echo "{$your_details['dob']}"?>' /></div>
    </div>

    <div class="item text">
        <label>Address:</label>
        <div class="field"><input type="text" name="address" value='<?php echo "{$your_details['address']}"?>' /></div>
    </div>

    <div class="item text">
        <label>About:</label>
        <div class="field"><input type="text" name="about" value='<?php echo "{$your_details['about']}"?>' /></div>
    </div>

    <div class="button-wrapper">
        <div class="discard_button_div">
          <a href="<?php echo '/'. raw_u(ROOT).'/paths/my_contacts.php'; ?>">
            <input type="button" id="contacts-op-discard" value="Discard" style="cursor: pointer;"></a>
        </div>
        
        <div class="save_button_div">
            <input type="submit" id="contacts-op-save" value="Save" style="cursor: pointer;">
        </div>
    </div>
</div>
</form>

    

</div>
        </div>

    </aside>

</section>

<script>
//   var span = document.getElementsByClassName("closee_song")[0];

//   span.onclick = function() {
//   modall.style.display = "none";
// }

</script>



<?php require_once(FOOTER_PATH); ?>
