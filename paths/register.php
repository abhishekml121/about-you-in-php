<?php 
    // Sessions use cookies which use headers.
    // Must start before any HTML output
    // unless out buffering is turned on.
session_start();
 ?>

<?php require_once('../path.php'); 

/*user can't go to signup page, if he is already loggedin*/
if (!empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/index.php');
}
$page_title = 'Free Account';
$header_title = "Signup Page";

?>
<?php require_once(HEADER_PATH); ?><br>

<?php

if(is_post_request()) {
  $register = [];
  $errors=[];
  // for profile_pic process
  // Valid file extensions for profile_pic
  $image_name = $_FILES['profile_pic']['name'];
  $target_dir = FILE_FOLDER.'/uploads/';
  
  
  // echo $image_name . "<br>", $target_dir."<br>", $target_file."<br>", $imageFileType."<br><br>";
  $required=['first_name'=>'can not blank','mobile'=>'can not blank','email'=>'can not blank','password'=>'can not blank'];
  //$register['register_id'] = $_POST['register_id'] ?? '';
  $register['first_name'] = $_POST['first_name'] ?? '';
  $register['middle_name'] = $_POST['middle_name'] ?? '';
  $register['last_name'] = $_POST['last_name'] ?? '';
  $register['visible'] = $_POST['visible'] ?? '';
  $register['dob'] = $_POST['dob'] ?? '';
  $register['mobile'] = $_POST['mobile'] ?? '';
  $register['email'] = $_POST['email'] ?? '';
  $register['address'] = $_POST['address'] ?? '';
  $register['hobby'] = $_POST['hobby'] ?? '';
  $register['password'] = $_POST['password'] ?? '';
  $register['profile_pic'] =  $image_name ??  '';
  $register['about_you'] = $_POST['about_you'] ?? '';
   
  $result = create_account($register);
  if($result === true){
    move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_dir.$image_name);
    $new_id = mysqli_insert_id($db);
    $_SESSION['user_id'] = $new_id;
    $_SESSION['first_name'] = $register['first_name'];
    /* It is use in account delete page*/
    $_SESSION['count'] = 0;
   
    redirect_to('/'.ROOT.'/paths/profile.php?id=' . $new_id);
  }else{
    $errors = $result;
    echo "Account NOT created";
  }
}
else{
    $register=[];
    $errors=[];
   
    $register['first_name'] ='';
$register['middle_name'] ='';
$register['last_name'] = '';
 $register['visible'] ='';
$register['dob'] ='';
$register['mobile'] ='';
$register['email'] = '';
$register['address'] =''; 
$register['hobby'] = '';
$register['about_you'] = '';
$register['password'] = '';
$register['profile_pic'] = '';
    
}
echo "<br><br>";
?>
<?php echo display_errors($errors);
echo "<br>"; ?>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>
<?php  ?>
<section id="register">

    <div class="border">
        <div id="register_image"></div>
        <!-- FORM START---------------- -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="register_form"  enctype='multipart/form-data'>
            <div class="label_div"><label for="first_name">First Name : </label><input type="text" placeholder="required"  onkeyup="inpt1();" id="first_name" name="first_name" value="<?php echo h($register['first_name']); ?>" required><span>*</span></div>

            <div class="label_div"><label for="middle_name">Middle Name : </label><input type="text" id="middle_name" name="middle_name" value="<?php echo h($register['middle_name']); ?>"></div>

            <div class="label_div"><label for="last_name">Last Name : </label><input type="text" id="last_name" name="last_name" value="<?php echo h($register['last_name']); ?>"></div>

             <div class="label_div"><label for="visible">Visible : </label>
            <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php //if($register['register_id'] == "1") { echo " checked"; } ?> /></div>

            <div class="label_div"><label for="dob">D.O.B : </label><input type="date" id="dob" name="dob" value="<?php echo h($register['dob']); ?>"></div>

            <div class="label_div"><label for="mobile">Mobile number : </label><input type="text" placeholder="required" id="mobile" name="mobile" value="<?php echo h($register['mobile']); ?>" required><span>*</span></div>

            <div class="label_div"><label for="email">Email : </label><input type="email" placeholder="required" id="email" name="email" value="<?php echo h($register['email']); ?>" required><span>*</span></div>

            <div class="label_div"><label for="address">Address : </label><input type="text" value="<?php echo h($register['address']); ?>" id="address" name="address"></div>

            <div class="label_div"><label for="hobby">Your hobby : </label><input type="text" value="<?php echo h($register['hobby']); ?>" id="hobby" name="hobby"></div>
            <div class="label_div"><label for="password">Password : </label><input type="password" placeholder="required" id="password" value="<?php echo h($register['password']); ?>" name="password" required><span>*</span></div>
            
            <div class="label_div"><label for="profile_pic">Profile pic : </label><input type="file" id="profile_pic" name="profile_pic"></div>

            <div class="label_div"><label for="about_you">About you : </label><br>
                <textarea id="about_you" placeholder="Type something about your self" name="about_you"><?php echo h($register['about_you']);?></textarea></div>
            <br><br>

            <div id="register_submit">
                <input type="submit" value="Submit" name="submit" /></div>

        </form>
    </div>
</section>
<script src="<?php echo '/'. ROOT .'/javascript/prevent.js';?>"></script>

<?php require_once(FOOTER_PATH); ?><br>