<?php
session_start();
 require_once('../path.php');
$page_title = 'About me';
$header_title = "About me";
 require_once(HEADER_PATH);
if (empty($_SESSION['user_id'])):
 ?>
 <div>
<h2 style="color: red;border:1px dotted red;display: inline-block; padding: 10px;">You are not loged in. <span><a href="<?php echo '/'. raw_u(ROOT).'/paths/login.php#login_form'; ?>"  style="color: green">Login</a></span></h2>

 </div>
<?php endif;?>
<?php if (!empty($_SESSION['user_id'])):?>

<section id="collections">
  
    <aside class="right_aside_collections">

        <div>
            <h1>My Details</h1>

            <?php
            
        /* It fetches all the users details according to the foreign key,
        and if the foreign key is not fetched that means current user
        didn't fill their own details, hence we're providing a link
         so that user can fill their own details */

// ------------I comment below developement values-------------------------
        $check_fk = check_collection_own_details($_SESSION['user_id']);
          /*echo "<pre>";
          print_r($check_fk);
          echo "</pre>";*/
          //developement values -----ENDS---------

/* It is telling that you didn't fill your own details and give a link in 
which he/she can fill their own detail */
           if (empty($check_fk['fk_id'])):?>

            <div id="ff101">
                <div title="you did't fill your details">
                <h4>It looks like that you didn't fill OR save any of your details. </h4>
                <h4>Please click on below link to fill your details.</h4>
                </div>
                <br>
                <a href="collections.php" title="click to fill your details">Fill your Details.</a>
                <?php endif;?>
                <!-- END if-------------  -->

            </div>

            <!-- It will show details of loggedin user -->
            <?php if (!empty($check_fk['fk_id'])):?>


            <section id="show_my_all_details_section">
                <article id="show_my_all_details_article" class="scrollbar">
                    <div id="show_name" class="show_details_heading">
                        <h3>Name</h3>
                        <p>
                            <?php echo ucfirst("${check_fk['full_name']}");  ?>
                        </p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Class</h3>
                        <p>
                            <?php echo "${check_fk['class']}";  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Roll Number</h3>
                        <p>
                            <?php echo "${check_fk['roll_number']}";  ?>
                        </p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Date Of Birth</h3>
                        <p>
                            <?php echo "${check_fk['dob']}";  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Email</h3>
                        <p><?php echo "${check_fk['email']}";  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Mobile Number</h3>
                        <p>
                            <?php echo "${check_fk['mobile_number']}";  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Blood Group</h3>
                        <p>
                            <?php echo "${check_fk['blood_group']}";  ?>
                        </p>
                    </div>

                    <div class="show_details_heading">
                        <h3>State</h3>
                        <p>
                            <?php echo ucwords("${check_fk['state']}");  ?></p>

                    </div>

                    <div class="show_details_heading">
                        <h3>Adhar</h3>
                        <p>
                            <?php echo "${check_fk['adhar']}";  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Address</h3>
                        <p>
                            <?php echo ucfirst("${check_fk['address']}");  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Hobbies</h3>
                        <p>
                            <?php echo ucfirst("${check_fk['hobbies']}");  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Achievements</h3>
                        <p>
                            <?php echo ucfirst("${check_fk['achievements']}");  ?></p>
                    </div>

                    <div class="show_details_heading">
                        <h3>Goal</h3>
                        <p>
                            <?php echo  ucfirst("${check_fk['goal']}");  ?></p>
                    </div>

                    <div class="" style="float: right;text-align: right; background-color: orangered;position: sticky;bottom: 0;right: 1px;padding: 5px;">
                        <a href="collections_edit.php" style="color: white;">Edit your details</a>
                    </div>

                </article>

                <article id="user_details_image">
                    <div>
                        <img src="<?php echo "/". IMAGE_PATH ."${check_fk['profile_pic']}"; ?>" alt="profile pic">
                        <p id="name_under_profile_pic">
                            <?php echo ucfirst("${check_fk['full_name']}");  ?>
                        </p>
                    </div>

                    <div id="serch_your_detail_div">
                        <input type="text" placeholder="search your details" id="serch_your_detail_input">
                        <p id="show_search_result">
                        </p>
                    </div>
                </article>

            </section>

            <?php endif; ?>

        </div>

    </aside>

</section>
<?php endif; ?>
<script>
let first_article_h3 = document.querySelectorAll("#show_my_all_details_article h3");
let serch_your_detail_input = document.getElementById("serch_your_detail_input");
let h3_p_value = [];
    
    function show(){
        var filter = serch_your_detail_input.value.toUpperCase();
       
       /* It deletes the previous search */
    document.getElementById("show_search_result").innerHTML = "";
for (let i = 0; i < first_article_h3.length; i++) { 
    var h3_value = first_article_h3[i].innerText;
    
    if (h3_value.toUpperCase().indexOf(filter) > -1) {
         document.getElementById("show_search_result").innerHTML +=  first_article_h3[i].nextElementSibling.innerText + "<br>" ;
        serch_your_detail_input.style.color = "green";
        
        }
    if(document.getElementById("show_search_result").innerHTML == ""){
        serch_your_detail_input.style.color = "red";
    }
    
}
        if(serch_your_detail_input.value == ""){
            document.getElementById("show_search_result").innerText = "";
        }        
    }
    serch_your_detail_input.addEventListener('keyup',show,false);
    
    

</script>
    
</main>
<script>

</script>



<?php require_once(FOOTER_PATH); ?>
