<?php
     function check_uniqueness_for_first_name($first_name){
    global $db;

    $sql = "SELECT * FROM users_account ";
    $sql .= "WHERE first_name='" . $first_name . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $unique = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $unique['first_name'] == $first_name ? false : true;
  }

function collection_own_details($register){
  global $db;
  global $errors;
  global $target_dir;

  $check_err = collection_own_details_check_errors($register,$errors);
 if(!empty($check_err)){
     return $check_err;
 }

 $sql = "INSERT INTO my_details ";
 $sql .= "(fk_id,full_name, class, roll_number,dob, email, mobile_number, blood_group, state, adhar, address, hobbies, achievements, profile_pic, goal) ";
    $sql .= "VALUES (";
    $sql .= "'" . $_SESSION['user_id'] . "',";
    $sql .= "'" . $register['full_name'] . "',";
    $sql .= "'" . $register['class'] . "',";
    $sql .= "'" . $register['roll_no'] . "',";
    $sql .= "'" . $register['dob'] . "',";
    $sql .= "'" . $register['email'] . "',";
    $sql .= "'" . $register['mobile'] . "',";
    $sql .= "'" . $register['blood_group'] . "',";
    $sql .= "'" . $register['state'] . "',";
    $sql .= "'" . $register['adhar'] . "',";
    $sql .= "'" . $register['address'] . "',";
    $sql .= "'" . $register['hobbies'] . "',";
    $sql .= "'" . $register['achievements'] . "',";
    $sql .= "'" . $register['profile_pic'] . "',";
    $sql .= "'" . $register['goal'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}



function contacts($register){
  global $db;
  global $errors;

  $check_err = contacts_check_errors($register,$errors);
 if(!empty($check_err)){
     return $check_err;
 }

 $sql = "INSERT INTO contacts ";
 $sql .= "(fk_id, name, mobile, email, dob, address, about) ";
    $sql .= "VALUES (";
    $sql .= "'" . $_SESSION['user_id'] . "',";
    $sql .= "'" . $register['name'] . "',";
    $sql .= "'" . $register['mobile'] . "',";
    $sql .= "'" . $register['email'] . "',";
    $sql .= "'" . $register['dob'] . "',";
    $sql .= "'" . $register['address'] . "',";
    $sql .= "'" . $register['about'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}


function audio($register){
  global $db;
  global $errors;

  $check_err = audio_check_errors($register,$errors);
 if(!empty($check_err)){
     return $check_err;
 }

 $sql = "INSERT INTO audio ";
 $sql .= "(fk_id, song_name, singer, language, file) ";
    $sql .= "VALUES (";
    $sql .= "'" . $_SESSION['user_id'] . "',";
    $sql .= "'" . $register['song_name'] . "',";
    $sql .= "'" . $register['singer'] . "',";
    $sql .= "'" . $register['language'] . "',";
    $sql .= "'" . $register['profile_pic'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}




function check_collection_own_details($user_id){
        global $db;

    $sql = "SELECT * FROM my_details ";
    $sql .= "WHERE fk_id='" . $user_id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_detail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user_detail; // returns an assoc. array
}

  function create_account($register) {
    global $db;
    global $register;
    global $errors;
    global $required;
    global $target_dir;

     $check_err = check_errors($register,$errors,$required);
 if(!empty($check_err)){
     return $check_err;
 }
 
  $sql = "INSERT INTO users_account ";
    $sql .= "(first_name, middle_name, last_name,visible, dob, mobile, email, address, hobby, password, profile_pic, about_you) ";
    $sql .= "VALUES (";
    $sql .= "'" . $register['first_name'] . "',";
    $sql .= "'" . $register['middle_name'] . "',";
    $sql .= "'" . $register['last_name'] . "',";
    $sql .= "'" . $register['visible'] . "',";
    $sql .= "'" . $register['dob'] . "',";
    $sql .= "'" . $register['mobile'] . "',";
    $sql .= "'" . $register['email'] . "',";
    $sql .= "'" . $register['address'] . "',";
    $sql .= "'" . $register['hobby'] . "',";
    $sql .= "'" . $register['password'] . "',";
    $sql .= "'" . $register['profile_pic'] . "',";
    $sql .= "'" . $register['about_you'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
/*
function find_all_account() {
    global $db;

    $sql = "SELECT * FROM users_account";
    $result = mysqli_query($db, $sql);

    confirm_result_set($result);
    $all_users_account = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
   // print_r($all_users_account);
    return $all_users_account; // returns an assoc. array
  }*/


function find_all_account() {
    global $db;

    $sql = "SELECT * FROM users_account";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
//     $all_users = mysqli_fetch_assoc($result);
// echo '<div class="attributes"><table>';
// $show_data = "<tr>";
// foreach ($all_users as $key => $value) {
//         $show_data.= "<th>{$key}</th>";
//               }
//       $show_data.= "</tr>";
// echo $show_data;
$i=0;
while ($all_users_account = mysqli_fetch_assoc($result)) {
    if ($i==0) {
  
echo '<div class="attributes"><table>';
$show_data = "<tr>";
foreach ($all_users_account as $key => $value) {
        $show_data.= "<th>{$key}</th>";
              }
      $show_data.= "</tr>";
echo $show_data;
$i=1;
}
$show_data = "<tr>";
        foreach ($all_users_account as $key => $value) {
          
          $show_data.= "<td>{$all_users_account[$key]}</td>";
        }
        $show_data.= "</tr>";
        echo $show_data;
   
    //return $all_users_account; // returns an assoc. array
  }
mysqli_free_result($result);
}
  


  function find_account_by_id($user_id) {
    global $db;

    $sql = "SELECT * FROM users_account ";
    $sql .= "WHERE register_id='" . $user_id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_detail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user_detail; // returns an assoc. array
  }

  function find_account_by_id_for_collections($user_id) {
    global $db;

    $sql = "SELECT * FROM my_details ";
    $sql .= "WHERE fk_id='" . $user_id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_detail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user_detail; // returns an assoc. array
  }

  function find_contact_by_id($user_id) {
    global $db;

    $sql = "SELECT * FROM contacts ";
    $sql .= "WHERE id='" . $user_id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_detail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user_detail; // returns an assoc. array
  }

  




function find_account_by_name($user_name) {
    global $db;

    $sql = "SELECT * FROM users_account ";
    $sql .= "WHERE first_name='" . $user_name . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user_detail = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user_detail; // returns an assoc. array
  }

  function update_profile($update_user_detail){
    global $db;

    $sql = "UPDATE users_account SET ";
    $sql .= "visible='" . $update_user_detail['visible'] . "', ";
    $sql .= "dob='" . $update_user_detail['dob'] . "', ";
    $sql .= "mobile='" . $update_user_detail['mobile'] . "', ";
    $sql .= "email='" . $update_user_detail['email'] . "', ";
    $sql .= "address='" . $update_user_detail['address'] . "', ";
    $sql .= "hobby='" . $update_user_detail['hobby'] . "', ";
    $sql .= "password='" . $update_user_detail['password'] . "', ";
    $sql .= "profile_pic='" . $update_user_detail['profile_pic'] . "', ";
    $sql .= "about_you='" . $update_user_detail['about_you'] . "' ";
    $sql .= "WHERE register_id='" . $_SESSION['user_id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  function update_collections($your_details){
    global $db;
  
    $sql = "UPDATE my_details SET ";
    $sql .= "full_name='" . $your_details['full_name'] . "', ";
    $sql .= "class='" . $your_details['class'] . "', ";
    $sql .= "roll_number='" . $your_details['roll_number'] . "', ";
    $sql .= "dob='" . $your_details['dob'] . "', ";
    $sql .= "email='" . $your_details['email'] . "', ";
    $sql .= "mobile_number='" . $your_details['mobile_number'] . "', ";
    $sql .= "blood_group='" . $your_details['blood_group'] . "', ";
    $sql .= "state='" . $your_details['state'] . "', ";
    $sql .= "adhar='" . $your_details['adhar'] . "', ";
    $sql .= "address='" . $your_details['address'] . "', ";
    $sql .= "hobbies='" . $your_details['hobbies'] . "', ";
    $sql .= "achievements='" . $your_details['achievements'] . "', ";
    $sql .= "profile_pic='" . $your_details['profile_pic'] . "', ";
    $sql .= "goal='" . $your_details['goal'] . "'";
    $sql .= "WHERE fk_id='" . $_SESSION['user_id'] . "'";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
      

    } else {
      // UPDATE failed

      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

function update_contacts($page) {
    global $db;
  //  global $update_this_id;

    $sql = "UPDATE contacts SET ";
    $sql .= "name='" . $page['name'] . "', ";
    $sql .= "mobile='" . $page['mobile'] . "', ";
    $sql .= "email='" . $page['email'] . "', ";
    $sql .= "dob='" . $page['dob'] . "', ";
    $sql .= "about='" . $page['about'] . "', ";
    $sql .= "address='" . $page['address'] . "' ";
    $sql .= "WHERE id='" . $page['id']  . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  function delete_account($id) {
    global $db;

$sql = "SELECT * FROM audio ";
    $sql .= "WHERE fk_id='" . $id . "' ";
    $result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_row($result)) {
  //var_dump($row[1]);
  if ($row[1]==$id) {
    $sql1 = "DELETE FROM audio ";
    $sql1 .= "WHERE fk_id='" . $id . "' ";
    $result1 = mysqli_query($db, $sql1);
  }
}

$sql = "SELECT * FROM contacts ";
    $sql .= "WHERE fk_id='" . $id . "' ";
    $result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_row($result)) {
  if ($row[1]==$id) {
    $sql1 = "DELETE FROM contacts ";
    $sql1 .= "WHERE fk_id='" . $id . "' ";
    $result1 = mysqli_query($db, $sql1);
  }
}

$sql = "SELECT * FROM my_details ";
    $sql .= "WHERE fk_id='" . $id . "' ";
    $result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_row($result)) {
  if ($row[1]==$id) {
    $sql1 = "DELETE FROM my_details ";
    $sql1 .= "WHERE fk_id='" . $id . "' ";
    $result1 = mysqli_query($db, $sql1);
  }
}

    $sql = "DELETE FROM users_account ";
    $sql .= "WHERE register_id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  function delete_contact($id) {
    global $db;


    $sql = "DELETE FROM contacts ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }




   function find_all_contacts() {
    global $db;

    $sql = "SELECT * FROM contacts WHERE fk_id = {$_SESSION['user_id']} ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_all_audio() {
    global $db;

    $sql = "SELECT * FROM audio WHERE fk_id = {$_SESSION['user_id']} ";
    $sql .= "ORDER BY song_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  ?>
