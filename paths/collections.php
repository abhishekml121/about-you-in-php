<?php 
session_start();
require_once('../path.php');

/*user can't go to collections page, if he is not loggedin*/
if (empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/paths/login.php');
}
$page_title = 'Coolections';
$header_title = "Your collections";
?>
<?php require_once(HEADER_PATH);

?><br>

<?php

if(is_post_request()) {
  $your_details = [];
  $errors=[];
  // for profile_pic process
  // Valid file extensions for profile_pic
  $image_name = $_FILES['profile_pic']['name'];
  $target_dir = FILE_FOLDER.'/uploads/';

  $your_details['full_name'] = $_POST['full_name'] ?? '';
  $your_details['class'] = $_POST['class'] ?? '';
  $your_details['roll_no'] = $_POST['roll_no'] ?? '';
  $your_details['dob'] = $_POST['dob'] ?? '';
  $your_details['email'] = $_POST['email'] ?? '';
  $your_details['mobile'] = $_POST['mobile'] ?? '';
   $your_details['blood_group'] = $_POST['blood_group'] ?? ''; 
  $your_details['state'] = $_POST['state'] ?? '';
  $your_details['adhar'] = $_POST['adhar'] ?? '';
  $your_details['address'] = $_POST['address'] ?? '';
  $your_details['hobbies'] = $_POST['hobbies'] ?? '';
  $your_details['achievements'] = $_POST['achievements'] ?? '';
  $your_details['profile_pic'] =  $image_name ??  '';
  $your_details['goal'] = $_POST['goal'] ?? '';

  echo '-------------';
  echo "<pre>";
 print_r($your_details);
  echo "</pre>";

  $result = collection_own_details($your_details);
  if($result === true){
    move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_dir.$image_name);
    $new_id = mysqli_insert_id($db);
    $_SESSION['user_details_id'] = $new_id;
    
  }else{
    $errors = $result;
    echo "Account NOT created";
  }
}
else{
    $your_details=[];
    $errors=[];
   
$your_details['full_name'] ='';
$your_details['class'] ='';
$your_details['roll_no'] ='';
$your_details['dob'] ='';
$your_details['email'] = '';
$your_details['mobile'] = '';
$your_details['blood_group'] ='';
$your_details['state'] ='';
$your_details['adhar'] ='';
$your_details['address'] =''; 
$your_details['hobbies'] = '';
$your_details['achievements'] = '';
$your_details['profile_pic'] = '';
$your_details['goal'] = '';
    
}
echo "<br><br>";
?>



<?php echo display_errors($errors);
echo "<br>"; ?>
<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>

<section id="collections">

    <?php
    require_once(FILE_FOLDER.'/includes/left_aside.php');
     ?>

    <aside class="right_aside_collections">

        <div>
            <h1>Your Details</h1>
            <!-- FORM START---------------- -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="collections_form" enctype='multipart/form-data'>
                <div class="label_input_div">
                    <label for="full_name">Full Name : </label>
                    <input type="text" name="full_name" id="full_name" placeholder="full name">
                </div>

                <div class="label_input_div">
                    <label for="class">Class : </label>
                    <input type="text" name="class" id="class" placeholder="branch"></div>

                <div class="label_input_div">
                    <label for="roll_no">Roll No. : </label>
                    <input type="text" name="roll_no" id="roll_no"></div>

                <div class="label_input_div">
                    <label for="dob">DOB : </label>
                    <input type="date" name="dob" id="dob"></div>

                <div id="fieldset_for_blood_group" class="label_input_div">
                    <label for="blood_group">Blood Group : </label>
                    <select name="blood_group" id="blood_group">
                        <option value="---">---</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="C+">C+</option>
                        <option value="C-">C-</option>

                    </select>
                </div>


                <div id="fieldset_for_state_options" class="label_input_div">
                    <label for="state">State : </label>
                    <select name="state" id="state">
                        <option value="---">---</option>
                        <option value="UP">Uttar pradesh</option>
                        <option value="MP">Madhya pradesh</option>
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="District of Columbia">District of Columbia</option>
                        <option value="Florida">Florida</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Guam">Guam</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option>
                        <option value="Indiana">Indiana</option>
                        <option value="Iowa">Iowa</option>
                        <option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option>
                        <option value="Louisiana">Louisiana</option>
                        <option value="Maine">Maine</option>
                        <option value="Maryland">Maryland</option>

                    </select>
                </div>

                <div class="label_input_div">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="label_input_div">
                    <label for="mobile">Mobile no. : </label>
                    <input type="mobile" name="mobile" id="mobile">
                </div>

                <div class="label_input_div">
                    <label for="adhar">Adhar : </label>
                    <input type="text" name="adhar" id="adhar" maxLength="14">
                </div>

                <div class="label_input_div">
                    <label for="address" id="label_for_address">Address : </label>
                    <textarea type="text" name="address" id="address"></textarea>
                </div>

                <div class="label_input_div">
                    <label for="hobbies">Hobbies : </label>
                    <input type="text" name="hobbies" id="hobbies"></div>

                <div class="label_input_div">
                    <label for="achievements">Achievements : </label>
                    <input type="text" name="achievements" id="achievements"></div>

                <div class="label_input_div">
                    <label for="profile_pic" id="label_for_profile_pic">Profile pic : </label>
                    <input type="file" id="profile_pic" name="profile_pic"></div>

                <div class="label_input_div">
                    <label for="goal">Your Goal : </label>
                    <input type="text" name="goal" id="goal">
                </div>


                <input type="submit" name="submit" id="collections_submit_btn" value="Submit">

            </form>

        </div>

    </aside>

</section>
<script>
    let i1 = document.getElementById("adhar");

    let i = 0;

    function c1_fun() {
        if (i1.value.length <= 13) {
            let i1_len = i1.value.length;

            if ((i1_len + 1) % 5 == 0) {

                i1.style.color = "red";
                i1.value = i1.value + "-";
            } else {
                i1.style.color = "green";


            }
            if (i1.value.length == 5) {

                let s1 = i1.value.slice(0, 4);
                if (!(!isNaN(parseFloat(s1)) && isFinite(s1))) {
                    i1.value = "";


                }
            }

            if (i1.value.length == 10) {

                let s2 = i1.value.slice(5, 9);
                if (!(!isNaN(parseFloat(s2)) && isFinite(s2))) {
                    i1.value = "";
                }
            }

            if (i1.value.length > 10) {

                let s3 = i1.value.slice(10, 14);
                if (!(!isNaN(parseFloat(s3)) && isFinite(s3))) {
                    i1.value = "";
                }
            }
        }

    }
    i1.addEventListener("keyup", c1_fun, false);
</script>



<?php require_once(FOOTER_PATH); ?>