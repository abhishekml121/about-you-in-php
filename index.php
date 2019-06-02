<?php
session_start();
if (!isset($_SESSION['user_id'])) {
$_SESSION['user_id']= '';
$_SESSION['first_name'] = '';
}

 require_once('path.php');
 require_once(HEADER_PATH);
 ?>

<main>

    <section id="about_web">
    	<div id="web_info1" class="rel">
    		<aside id="aside1"><img src="images/con.svg" alt=""></aside>
    		<aside id="aside2"><p id="web_info1_p">Save your contacts<br>and access at any time</p></aside>
    		<aside id="aside3"><img src="images/1.svg" alt=""></aside>
    	</div>

    	<div id="web_info2" class="rel">
    		<aside id="aside1_info2"><img src="images/mu.svg" alt=""></aside>
    		<aside id="aside2_info2"><p id="web_info2_p">Save your favourite musics</p></aside>
    		<aside id="aside3_info2"><img src="images/two.svg" alt=""></aside>
    	</div>

    	<div id="web_info3" class="rel">
    		<aside id="aside1_info3"><img src="images/about_me1.svg" alt=""></aside>
    		<aside id="aside2_info3"><p id="web_info3_p">Save your own details</p></aside>
    		<aside id="aside3_info3"><img src="images/3.svg" alt=""></aside>
    	</div>

    	<div id="web_info4" class="rel">
    		<aside id="aside1_info4"><img src="images/todo.svg" alt=""></aside>
    		<aside id="aside2_info4"><p id="web_info4_p">Track your work day by day</p></aside>
    		<aside id="aside3_info4"><img src="images/4a.svg" alt=""></aside>
    	</div>

    	<!-- <div>
    		
    	</div>

    	<div>
    		
    	</div>

    	<div>
    		
    	</div> -->
    </section>
    
</main>
<script>
var web_info1_as1 = document.getElementById("aside1");
var web_info1_as2 = document.getElementById("aside2");
var web_info1_as3 = document.getElementById("aside3");

function spread(){
  web_info1_as3.style.left="870px";
  web_info1_as1.style.left="200px";
    // console.log(web_info1_as3);
}
function stay_default(){
	web_info1_as3.style.left="770px";
	web_info1_as1.style.left="300px";
}
web_info1_as2.addEventListener("mouseover", spread ,false);
web_info1_as2.addEventListener("mouseout", stay_default ,false);

/*info2__info2__info2__info2__info2__info2*/
var web_info2_as1 = document.getElementById("aside1_info2");
var web_info2_as2 = document.getElementById("aside2_info2");
var web_info2_as3 = document.getElementById("aside3_info2");
function spread2(){
  web_info2_as3.style.left="870px";
  web_info2_as1.style.left="200px";
 
}
function stay_default2(){
	web_info2_as3.style.left="770px";
	web_info2_as1.style.left="300px";
}
web_info2_as2.addEventListener("mouseover", spread2 ,false);
web_info2_as2.addEventListener("mouseout", stay_default2 ,false);

/*--STARTS---info3__info3__info3__info3__info3__info3--STARTS--*/
var web_info3_as1 = document.getElementById("aside1_info3");
var web_info3_as2 = document.getElementById("aside2_info3");
var web_info3_as3 = document.getElementById("aside3_info3");
function spread3(){
  web_info3_as3.style.left="870px";
  web_info3_as1.style.left="200px";
 
}
function stay_default3(){
	web_info3_as3.style.left="770px";
	web_info3_as1.style.left="300px";
}
web_info3_as2.addEventListener("mouseover", spread3 ,false);
web_info3_as2.addEventListener("mouseout", stay_default3 ,false);
/*--ENDS----info3__info3__info3__info3__info3__info3--ENDS*/


/*--STARTS---info_4info_4info_4info_4info_4info_4 --STARTS--*/
var web_info4_as1 = document.getElementById("aside1_info4");
var web_info4_as2 = document.getElementById("aside2_info4");
var web_info4_as3 = document.getElementById("aside3_info4");
function spread4(){
  web_info4_as3.style.left="870px";
  web_info4_as1.style.left="200px";
 
}
function stay_default4(){
	web_info4_as3.style.left="770px";
	web_info4_as1.style.left="300px";
}
web_info4_as2.addEventListener("mouseover", spread4 ,false);
web_info4_as2.addEventListener("mouseout", stay_default4 ,false);
/*--ENDS---info_4info_4info_4info_4info_4info_4 --END--*/

</script>



<?php require_once(FOOTER_PATH); ?>
