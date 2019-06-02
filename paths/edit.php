<?php
session_start();

require_once('../path.php'); 
$page_title = 'Free Account';
$header_title = "Edit Profile";

if(!empty($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $edit_user_detail = find_account_by_id($user_id);
}
else{
redirect_to('/'.ROOT.'/paths/login.php');
}
?>

<?php require_once(HEADER_PATH); ?><br>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>

   <?php

if(is_post_request()) {

  $register = [];
  $errors = [];
  /* for profile pic */
   $image_name = $_FILES['profile_pic']['name'];
  $target_dir = FILE_FOLDER.'/uploads/';

  $required=['mobile'=>'can not blank','email'=>'can not blank','password'=>'can not blank'];
  //$register['id'] = $id;
  $edit_user_detail['visible'] = $_POST['visible'] ?? '';
  $edit_user_detail['dob'] = $_POST['dob'] ?? '';
  $edit_user_detail['mobile'] = $_POST['mobile'] ?? '';
  $edit_user_detail['email'] = $_POST['email'] ?? '';
  $edit_user_detail['address'] = $_POST['address'] ?? '';
  $edit_user_detail['hobby'] = $_POST['hobby'] ?? '';
  $edit_user_detail['password'] = $_POST['password'] ?? '';
  $edit_user_detail['profile_pic'] = $image_name ?? '';
  $edit_user_detail['about_you'] = $_POST['about_you'] ?? '';

$check_update_profile_errors_function = check_update_profile_errors($edit_user_detail, $errors, $required);
/* This if emplies that, there  is no errors for edited profile's values*/
if (empty($check_update_profile_errors_function)) {
  // echo "NO errors found";
  /* If there  is no errors for edited profile's values then update all values in sql. So, for update and insert SQL queries $result will be true OR false*/
  $result = update_profile($edit_user_detail);
  if($result === true){
    // echo "<br>update success !";
    /*if SQL update query updated profile's values then choosen profile_pic copy 
    from original folder to server folder (in this case : profile images are copies to 'uploads' folder in server) */
    move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_dir.$image_name);
    redirect_to('/'.ROOT.'/paths/profile.php');
  }
}


}

else{
    $register=[];
    $errors=[];
    $check_update_profile_errors_function = '';

}
echo "<pre>";
  print_r($edit_user_detail);
  echo "</pre>";
echo "<br><br>";
?>
<?php display_update_profile_errors($check_update_profile_errors_function);
?>
    <section id="edit_profile">

    <div class="border">
        <div id="edit_profile_page_image"></div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="edit_profile_form"  enctype='multipart/form-data'>
            <div class="label_div" title="You can't change this"><label for="first_name">First Name : </label><input type="text" id="first_name" name="first_name" value="<?php echo h($edit_user_detail['first_name']); ?>" disabled></div>

            <div class="label_div" title="You can't change this"><label for="middle_name">Middle Name : </label><input type="text" id="middle_name" name="middle_name" value="<?php echo h($edit_user_detail['middle_name']); ?>" disabled></div>

            <div class="label_div" title="You can't change this"><label for="last_name">Last Name : </label><input type="text" id="last_name" name="last_name" value="<?php echo h($edit_user_detail['last_name']); ?>" disabled></div>

            <div class="label_div"><label for="visible">Visible : </label>
            <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if($edit_user_detail['visible'] == "1") { echo " checked"; } ?> /></div>

            <div class="label_div"><label for="dob">D.O.B : </label><input type="date" id="dob" name="dob" value="<?php echo h($edit_user_detail['dob']); ?>"></div>

            <div class="label_div"><label for="mobile">Mobile number : </label><input type="text" id="mobile" name="mobile" value="<?php echo h($edit_user_detail['mobile']); ?>" required></div>

            <div class="label_div"><label for="email">Email : </label><input type="email" id="email" name="email" value="<?php echo h($edit_user_detail['email']); ?>" required></div>

            <div class="label_div"><label for="address">Address : </label><input type="text" value="<?php echo h($edit_user_detail['address']); ?>" id="address" name="address"></div>

            <div class="label_div"><label for="hobby">Your hobby : </label><input type="text" value="<?php echo h($edit_user_detail['hobby']); ?>" id="hobby" name="hobby"></div>
            <div class="label_div"><label for="password">Password : </label><input type="password" id="password" value="<?php echo h($edit_user_detail['password']); ?>" name="password" required></div>
            
            <div class="label_div"><label for="profile_pic">Profile pic : </label><input type="file" id="profile_pic" name="profile_pic"></div>

            <div class="label_div"><label for="about_you">About you : </label><br>
                <textarea id="about_you" placeholder="Type something about your self" name="about_you"><?php echo h($edit_user_detail['about_you']);?></textarea></div>
            <br><br>

            <div id="edit_profile_submit">
                <input type="submit" value="Submit" /></div>

        </form>
    </div>
</section>

<?php require_once(FOOTER_PATH); ?><br>
