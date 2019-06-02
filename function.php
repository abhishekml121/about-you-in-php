<?php

function u($string=""){
    return(urlencode($string));
}
function raw_u($string=""){
    return(rawurlencode($string));
}
function h($string="") {
  return htmlspecialchars($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}


function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}


  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }
  function has_presence($value) {
    return !is_blank($value);
  }

 function collection_own_details_check_errors($register, $errors){
global $image_name;
global $target_dir;
    if(!empty($register['mobile'])){
    if(strlen(($register['mobile'])) < 10){
        $errors['mobile'] = 'length must be 10 in digits';   
    }} /*end of if()*/

    // for  image file name storing
    $extensions_arr = array("jpg","jpeg","png","gif", "svg");
  
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  /* Given below 'if' runs only when if the user choose a profile pic during registration form,
  so it'll not run if the user didn't choose a profile pic.
  */
    if( !in_array($imageFileType,$extensions_arr) && !empty($register['profile_pic'])){

      if(strlen($register['profile_pic']) < 255){
      $errors['profile_pic'] = "{$register['profile_pic']} is not a valid image"." PLEASE CHOOSE A VALID IMAGE .";
    }else{
      $errors['profile_pic'] = "Name of the {$register['profile_pic']} must be less than <big><b>255<b></big>";
    }

 } // end of if

/* It checks that inputed values contains html code OR NOT*/
    foreach ($register as $key => $value) {
      if($value != strip_tags($value)) {
      $errors[$key]= "can not contain HTML or these '< >' symbols";
}
    } /*end of second foreach()*/

        return $errors;
  }




  function contacts_check_errors($register, $errors){

    if(!empty($register['mobile'])){
    if(strlen(($register['mobile'])) < 10){
        $errors['mobile'] = 'length must be 10 in digits';   
    }} /*end of if()*/


/* It checks that inputed values contains html code OR NOT*/
    foreach ($register as $key => $value) {
      if($value != strip_tags($value)) {
      $errors[$key]= "can not contain HTML or these '< >' symbols";
}
    } /*end of second foreach()*/

        return $errors;
  }



  function check_errors($register, $errors, $required){
    /*This will store true or false, false means requested first_name is already a member so you have to change first_name*/
    $info_for_uniqueness = check_uniqueness_for_first_name($register['first_name']);
    /*This will generate an error, if requested first_name is already a member*/
    if ($info_for_uniqueness === false) {
      $errors['Sorry'] = "{$register['first_name']} is already a member of this site. Please choose different first name.";
    }

  	foreach ($required as $key => $value) {
  		if(!has_presence($register[$key])){
  			$errors[$key] = "can not blank";
  		} /*end of if()*/

  		if(strlen(($register['password'])) < 4){
  			$errors['password'] = 'length must be greater than 3';	 
  	} /*end of if()*/
  	if(strlen(($register['mobile'])) < 4){
  			$errors['mobile'] = 'length must be 10 in digits';	 
  	} /*end of if()*/


  	
  	} /*end of first foreach()*/

  	// for  image file name storing
global $image_name;
global $target_dir;
  	$extensions_arr = array("jpg","jpeg","png","gif", "svg");
  
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  /* Below if runs only when if the user choose a profile pic during registration form,
  so it'll not run if the user didn't choose a profile pic.
  */
  	if( !in_array($imageFileType,$extensions_arr) && !empty($register['profile_pic'])){
  		if(strlen($register['profile_pic']) < 255){
  		$errors['profile_pic'] = "{$register['profile_pic']} is not a valid image"." PLEASE CHOOSE A VALID IMAGE .";
  	}else{
  		$errors['profile_pic'] = "Name of the {$register['profile_pic']} must be less than <big><b>255<b></big>";
  	}

 } // end of if

/* It checks that inputed values contains html code OR NOT*/
  	foreach ($register as $key => $value) {
  		if($value != strip_tags($value)) {
  		$errors[$key]= "can not contain HTML";
}
  	} /*end of second foreach()*/

  	  	return $errors;
  }


  function audio_check_errors($register, $errors){
global $image_name;
global $target_dir;

    // for  audio file name storing
    $extensions_arr = array("mp3","wav","ogg","oga");
  
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if( !in_array($imageFileType,$extensions_arr)){

      if(strlen($register['profile_pic']) < 255){
      $errors['audio'] = "{$register['profile_pic']} is not a valid audio file"." PLEASE CHOOSE A VALID AUDIO FILE .";
    }else{
      $errors['audio'] = "Name of the {$register['profile_pic']} must be less than <big><b>255<b></big>";
    }

 } // end of if

 if (empty($register['profile_pic'])) {
   $errors['audio'] = "Please set a song";
 }

/* It checks that inputed values contains html code OR NOT */
    foreach ($register as $key => $value) {
      if($value != strip_tags($value)) {
      $errors[$key]= "can not contain HTML or these '< >' symbols";
}
    } /*end of second foreach()*/

        return $errors;
  }


function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class='errors' id='registration_err'>";
    $output .= "Please fix the following errors:";
    $output .= "<ol>";
    foreach($errors as $show_err => $err_value) {
      $output .= "<li>" . h(ucwords(str_replace('_', ' ', $show_err))) . ' : ' . h($err_value) . "</li>";
    }
    
    $output .= "</ol>";
    $output .= "</div>";
  }
  echo $output;
}

function check_login_errors($login_details, $account_by_name){
  $login_errors = [];
  if (!empty($account_by_name)) {
  if ($account_by_name['password'] == $login_details['password']) {
   
  $_SESSION['user_id'] = $account_by_name['register_id'];
  $_SESSION['first_name'] = $account_by_name['first_name'];
  $_SESSION['password'] = $account_by_name['password'];
  $_SESSION['count'] = 0;
  redirect_to('/'.ROOT.'/paths/profile.php');
}
else{
  $login_errors[] = "Wrong password";
}

  echo "Account found <br>";
  echo "<pre>";
  print_r($account_by_name);
  echo "</pre>";
   
}
else{
  $login_errors[] = "Account for <span class='account_not_found'>{$login_details['first_name']}</span> NOT found";
}
return $login_errors;

}

function display_login_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class='errors' id='login_err'>";
    $output .= "Please fix the following errors:";
    $output .= "<ol>";
    foreach ($errors as $show_login_errors) {
      $output .="<li>" . $show_login_errors ."</li>";
}
$output .= "</ol>";
    $output .= "</div>";
  }
    echo $output;
  }

function check_update_profile_errors($register, $errors, $required){
    global $image_name;
    global $target_dir;
  	foreach ($required as $key => $value) {
  		if(!has_presence($register[$key])){
  			$errors[$key] = "can not blank";
  		} /*end of if()*/

  		if(strlen(($register['password'])) < 4){
  			$errors['password'] = 'length must be greater than 3';	 
  	} /*end of if()*/

    } /*end of first foreach()*/

    
    $extensions_arr = array("jpg","jpeg","png","gif", "svg");
  
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if( !in_array($imageFileType,$extensions_arr) && !empty($register['profile_pic'])){
      if(strlen($register['profile_pic']) < 255){
      $errors['profile_pic'] = "{$register['profile_pic']} is not a valid image"." PLEASE CHOOSE A VALID IMAGE .";
    }else{
      $errors['profile_pic'] = "Name of the {$register['profile_pic']} must be less than <big><b>255<b></big>";
    }
  }
    
    foreach ($register as $key => $value) {
  		if($value != strip_tags($value)) {
  		$errors[$key]= "can not contain HTML";
}
  	} /*end of second foreach()*/
    
  return $errors;
  	} 



    function check_update_collections_errors($register, $errors){
    global $image_name;
    global $target_dir;

    if(!empty($register['mobile'])){
    if(strlen(($register['mobile'])) < 10){
        $errors['mobile'] = 'length must be 10 in digits';   
    }} /*end of if()*/

    
  // for  image file name storing
    $extensions_arr = array("jpg","jpeg","png","gif", "svg");
  
  $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  /* Given below 'if' runs only when if the user choose a profile pic during registration form,
  so it'll not run if the user didn't choose a profile pic.
  */
    if( !in_array($imageFileType,$extensions_arr) && !empty($register['profile_pic'])){

      if(strlen($register['profile_pic']) < 255){
      $errors['profile_pic'] = "{$register['profile_pic']} is not a valid image"." PLEASE CHOOSE A VALID IMAGE .";
    }else{
      $errors['profile_pic'] = "Name of the {$register['profile_pic']} must be less than <big><b>255<b></big>";
    }

 } // end of if
    
    foreach ($register as $key => $value) {
      if($value != strip_tags($value)) {
      $errors[$key]= "can not contain HTML";
}
    } /*end of second foreach()*/
    
  return $errors;
    }

    


function display_update_profile_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class='errors' id='registration_err'>";
    $output .= "Please fix the following errors:";
    $output .= "<ol>";
    foreach($errors as $show_err => $err_value) {
      $output .= "<li>" . h(ucwords(str_replace('_', ' ', $show_err))) . ' : ' . h($err_value) . "</li>";
    }
    
    $output .= "</ol>";
    $output .= "</div>";
  }
  echo $output;
}



function modal_box_for_delete_accout(){
  $modal = <<<EOT
 <div id="myModal" class="modal">

  
  <div class="modal-content">
    <div class="modal-header">
      <h2>Modal Header</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// When the user clicks the button, open the modal 
  modal.style.display = "block";
</script>
EOT;

echo $modal;
}

?>