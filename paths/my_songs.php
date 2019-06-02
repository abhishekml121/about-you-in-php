<?php 
session_start();
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

require_once('../path.php');

/* user can't go to collections page, if he is not loggedin */
if (empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/paths/login.php');
}
$page_title = 'My Songs';
$header_title = "My Songs";
?>
<?php require_once(HEADER_PATH);

?><br>

<?php

if(is_post_request()) {
  $your_details = [];
  $errors=[];
  // for audio process
  $image_name = $_FILES['profile_pic']['name'];
  $target_dir = FILE_FOLDER.'/uploads/audio/';

  $your_details['song_name'] = $_POST['name'] ?? '';
  $your_details['singer'] = $_POST['singer'] ?? '';
  $your_details['language'] = $_POST['language'] ?? '';
  $your_details['profile_pic'] =  $image_name ??  '';

//---------DEVELOPEMENT VALUES---------------
 /* echo '-------------';
  echo "<pre>";
 print_r($your_details);
  echo "</pre>";*/

  $result = audio($your_details);
  if($result === true){
    move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target_dir.$image_name);
    // $new_id = mysqli_insert_id($db);
    // $_SESSION['user_details_id'] = $new_id;
    
  }else{
    $errors = $result;
    echo "Account NOT created";
  }
}
else{
    $your_details=[];
    $errors=[];
   
$your_details['song_name'] ='';
$your_details['singer'] ='';
$your_details['language'] ='';
$your_details['profile_pic'] ='';
    
}
$audio_set = find_all_audio();
//print_r($audio_set);
 ?><br>

<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>

<section id="collections">

    <?php
    require_once(FILE_FOLDER.'/includes/left_aside.php');
     ?>

    <aside class="right_aside_collections">
        <h1 style="margin: 0;" id="my_songs_h1"><!-- My Songs --></h1>
        <br><br>
        <div id="songs_table_up_div" style="margin-left: 37px;">
            <div id="song_tools" style="position: sticky;top: 0;left: 0;z-index: 1;margin-top:7px;">
    <input type="button" id="create_new_contact_button" value="Add New Song" style="cursor: pointer;">

    <input type="text" id="myInput" placeholder="Search by name" title="Type in a name">
    </div>

    <table class="song_table" id="song_table_id">
      <tr>
        <th>Song Name</th>
        <th>Singer</th>
        <th>Language</th>
        <th>File</th>
        <th>Play</th>
        <th>Location</th>       
      </tr>
        
        <?php while($page = mysqli_fetch_assoc($audio_set)):?>
        
        <tr>
          <td><?php echo h($page['song_name']); ?></td>
          <td><?php echo h($page['singer']); ?></td>
          <td><?php echo h($page['language']); ?></td>
          <td><?php echo h($page['file']); ?></td>
          
         <!--  <td><a class="action" href="<?php echo "./my_contacts_edit.php?id=${page['id']}"; ?>">Edit</a></td>
         <td><a class="action" href="<?php echo "./my_contacts_delete.php?id=${page['id']}"; ?>">Delete</a></td> -->

         <td><audio controls>
  <source src="<?php echo '/'. raw_u(ROOT).'/uploads/audio/' . $page['file']; ?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio></td>
<td><?php echo '/'. raw_u(ROOT).'/uploads/audio/' . $page['file']; ?></td>
          </tr>

      <?php endwhile;?>
    </table>
</div>
<!-- Trigger/Open The Modal -->
  <!-- Modal content ------START-------- -->
<div id="myModall_song" class="modall_song">

  <div id="edit_contact_div_song">
      <?php echo display_errors($errors); ?>
<form id="contacts-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>"  enctype='multipart/form-data'>

<div id="close_button_for_song">

    <span class="closee_song">&times;</span>
    </div>
    <div id="div_inside_contact_form_song">
    <div class="item text">
        <label>Song Name:</label>
        <div class="field"><input type="text" name="name"></div>
    </div>
    <div class="item text">
        <label>Singer:</label>
        <div class="field"><input type="text" name="singer"/></div>
    </div>
  
    <div class="item text">
        <label>Language:</label>
        <div class="field"><input type="text" name="language" /></div>
    </div>


    <div class="item text">
        <label>File:</label>
        <div class="field"><input type="file" name="profile_pic"  id="profile_pic" style="cursor: pointer;"></div>
    </div>

    <div class="button-wrapper">
        <div class="discard_button_div">
            <input type="button" id="contacts-op-discard" value="Discard" style="cursor: pointer;">
        </div>
        
        <div class="save_button_div">
            <input type="submit" id="contacts-op-save" value="Save" />
        </div>
    </div>
</div>
</form>

</div>

</div>


  <!-- Modal content ------END-------- -->
    </aside>



</section>

<script>

let create_new_contact_button = document.getElementById("create_new_contact_button");
let contacts_form = document.getElementById("contacts-form");
let contacts_discard = document.getElementById("contacts-op-discard");
let modall = document.getElementById('myModall_song');
let save_contact = document.getElementById('contacts-op-save');
let input = document.getElementById("myInput");
let count_of_button_press = 0;
let count_of_discard_press = 0;

/* If there are form errors then it will show to you*/
if(document.getElementById("registration_err") != null){
  modall.style.display = "block";           
            }


    function show(e){
  modall.style.display = "block";
         
    }
    /*FOR MODAL WINDOW --------------START----------*/
    // Get the modal
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closee_song")[0];

// When the user clicks the button, open the modal 
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modall.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modall) {
    modall.style.display = "none";
  }
}
/*FOR MODAL WINDOW --------------END----------*/

    let all_inpt = document.querySelectorAll("input");

function clear(e){
        //e.preventDefault();
        for(let i=1; i<all_inpt.length-3; i++){
            all_inpt[i].value="";
        }

        if(count_of_discard_press <1){
            //contacts_form.style.display="block";
            count_of_discard_press++;
            //count_of_button_press = 0;
        }else{
        if(count_of_discard_press >=1){
            count_of_discard_press = 0;
            //count_of_button_press = 0;
            //contacts_form.style.display="none";
            modall.style.display = "none";
            
        }  
    }
    }

function save(){
if(document.getElementById("registration_err") != null){
  modall.style.display = "block";           
            }
}

/* FUNCTION FOR SEARCH TABLE CONTACTS ------START--------*/
function search_contact(){
  var filter, table, tr, td, i;
  
  filter = input.value.toUpperCase();
  table = document.getElementById("song_table_id");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        // input.style.color = "green";
      } else {
        tr[i].style.display = "none";
        

        
    }       
}
}
}

var i = 0;
var txt = 'My Songs';
var speed = 50;

function typeWriter() {

  if (i < txt.length) {
    document.getElementById("my_songs_h1").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
setTimeout(typeWriter, 1000);
/* FUNCTION FOR SEARCH TABLE CONTACTS ------ENDS--------*/


/*for search contact */
    input.addEventListener('keyup',search_contact,false);

    /*for create NEW contact */
    create_new_contact_button.addEventListener('click',show,false);

        /*for CLEAR the  contact values in form*/
    contacts_discard.addEventListener('click',clear,false);

        /*for SAVE the created contact */
    save_contact.addEventListener('click',save,false);
    

</script>



<?php require_once(FOOTER_PATH); ?>
