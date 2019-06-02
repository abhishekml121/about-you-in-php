<?php 
session_start();
require_once('../path.php');

/*user can't go to collections page, if he is not loggedin*/
if (empty($_SESSION['user_id'])) {
  redirect_to('/'.ROOT.'/paths/login.php');
}
$page_title = 'My Contacts';
$header_title = "My Contacts";
?>
<?php require_once(HEADER_PATH);

?><br>

<?php

if(is_post_request()) {
  $your_details = [];
  $errors=[];
  // for profile_pic process
  // Valid file extensions for profile_pic
  

  $your_details['name'] = $_POST['name'] ?? '';
  $your_details['mobile'] = $_POST['mobile'] ?? '';
  $your_details['email'] = $_POST['email'] ?? '';
  $your_details['dob'] = $_POST['dob'] ?? '';
  
  $your_details['address'] = $_POST['address'] ?? '';
  
  $your_details['about'] = $_POST['about'] ?? '';
$result = contacts($your_details);
  if($result === true){
    $new_id = mysqli_insert_id($db);
    //redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
    //$_SESSION['user_details_id'] = $new_id;
    
  }else{
    $errors = $result;
  }
} else{
    $errors= [];
    $your_details = [];
    $your_details['name'] = '';
  $your_details['mobile'] = '';
  $your_details['email'] =  '';
  $your_details['dob'] = '';
  
  $your_details['address'] = '';
  
  $your_details['about'] = '';
}

$contact_set = find_all_contacts();
// echo "-----------";
// echo "<pre>";
// print_r($contact_set);
// echo "</pre>";

?>

<a href="<?php echo $link_root . "/index.php"; ?>">&laquo; &laquo; &laquo; HOME</a><br><br>


<section id="collections">

    <?php
    require_once(FILE_FOLDER.'/includes/left_aside.php');
     ?>

    <aside class="right_aside_collections">

        <div>

<div class="tablet">
  <div class="content">
    <h1 style="margin: 0;">Contact</h1>
    <input type="button" id="create_new_contact_button" value="Add New Contact" style="cursor: pointer;">

    <input type="text" id="myInput" placeholder="Search for names.." title="Type in a name">

    <table class="contacts_table" id="contact_table_id">
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Address</th>
        <th>About</th>
        <th colspan="2">Actions</th>       
      </tr>
<?php while($page = mysqli_fetch_assoc($contact_set)):?>
        
        <tr>
          <td><?php echo h($page['name']); ?></td>
          <td><?php echo h($page['mobile']); ?></td>
          <td><?php echo h($page['email']); ?></td>
          <td><?php echo h($page['address']); ?></td>
          <td><?php echo h($page['about']); ?></td>
          
          <td><a class="action" href="<?php echo "./my_contacts_edit.php?id=${page['id']}"; ?>">Edit</a></td>
          <td><a class="action" href="<?php echo "./my_contacts_delete.php?id=${page['id']}"; ?>">Delete</a></td>
          </tr>
      <?php endwhile;?>
    </table>
  </div>
</div>
<!-- <table class="contacts_table">
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Address</th>
        <th>About</th>
        <th colspan="3">Actions</th>       
      </tr>
<?php while($page = mysqli_fetch_assoc($contact_set)):?>
        
        <tr>
          <td><?php echo h($page['name']); ?></td>
          <td><?php echo h($page['mobile']); ?></td>
          <td><?php echo h($page['email']); ?></td>
          <td><?php echo h($page['address']); ?></td>
          <td><?php echo h($page['about']); ?></td>
          <td><a class="action" href="<?php echo "${page['id']}"; ?>">View</a></td>
          <td><a class="action" href="<?php echo "${page['id']}"; ?>">Edit</a></td>
          <td><a class="action" href="<?php echo "${page['id']}"; ?>">Delete</a></td>
          </tr>
      <?php endwhile;?>
    </table> --><br><br>
    <?php mysqli_free_result($contact_set); ?>



<!-- Trigger/Open The Modal -->
  <!-- Modal content ------START-------- -->
<div id="myModall" class="modall">


  <div class="modal-contentt">
    <div class="modal-headerr">
      <span class="closee">&times;</span>
      <h2>Create new contact</h2>
    </div>
    <div class="modal-bodyy">
<?php echo display_errors($errors); ?>
<form id="contacts-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <div id="div_inside_contact_form">
    <div class="item text">
        <label>Name:</label>
        <div class="field"><input type="text" name="name" required />*</div>
    </div>
    <div class="item text">
        <label>Mobile:</label>
        <div class="field"><input type="text" name="mobile" placeholder="must be 10 digits" required />*</div>
    </div>
    <div class="item text">
        <label>Email:</label>
        <div class="field"><input type="text" name="email" /></div>
    </div>

    <div class="item text">
        <label>DOB:</label>
        <div class="field"><input type="text" name="dob" /></div>
    </div>

    <div class="item text">
        <label>Address:</label>
        <div class="field"><input type="text" name="address" /></div>
    </div>

    <div class="item text">
        <label>About:</label>
        <div class="field"><input type="text" name="about" /></div>
    </div>

    <div class="button-wrapper">
        <div class="discard_button_div">
            <input type="button" id="contacts-op-discard" value="Discard" />
        </div>
        
        <div class="save_button_div">
            <input type="submit" id="contacts-op-save" value="Save" />
        </div>
    </div>
</div>
</form>

    </div>
    <div class="modal-footerr">
      <h3>Your contacts will be show in screen of IPAD</h3>
    </div>
  </div>

</div>


  <!-- Modal content ------END-------- -->

        </div>

    </aside>

</section>

<script>

let create_new_contact_button = document.getElementById("create_new_contact_button");
let contacts_form = document.getElementById("contacts-form");
let contacts_discard = document.getElementById("contacts-op-discard");
let modall = document.getElementById('myModall');
let save_contact = document.getElementById('contacts-op-save');
let input = document.getElementById("myInput");
let count_of_button_press = 0;
let count_of_discard_press = 0;

/* If there are form errors then it will show to you*/
if(document.getElementById("registration_err") != null){
  modall.style.display = "block";           
            }
    
    function show(e){
        //e.preventDefault();
        //if(count_of_button_press == 0){
            //contacts_form.style.display="block";
            //count_of_button_press = 1;
            
  modall.style.display = "block";

        //}else{
            //contacts_form.style.display="none";
            //count_of_button_press = 0;
        //}
    
    //document.getElementById("show_search_result").innerHTML = "";
         
    }

    /*FOR MODAL WINDOW --------------START----------*/

    // Get the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closee")[0];

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
  table = document.getElementById("contact_table_id");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }

}
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
