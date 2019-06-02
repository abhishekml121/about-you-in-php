
<footer>
	<section id="part_of_footer">
	<span class="ttp">T</span> <span id="top_symbol"><!-- &#9996; --><img src="<?php echo '/'.ROOT . '/images/top.svg'?>" alt="footer_logo" style="width: 35px"></span><span class="ttp"> P</span>
</section>
	<div id="copyright">
  &copy; <?php echo date('Y'); ?> | Abhishek kamal
  </div>
  <div id="footer_logo"><img src="<?php echo '/'.ROOT . '/images/distributor-over.svg'?>" alt="footer_logo"></div>
</footer>

<script >
let footer = document.querySelector("footer");
let topp = document.getElementById("part_of_footer");

function topFunction(e) {
  var _docHeight = (document.height !== undefined) ? document.height : document.body.offsetHeight;
  var top_count = _docHeight  - 600;
                //e.preventDefault();
                let dec = setInterval(function ff(){
                  document.body.scrollTop = top_count; // For Safari
                  document.documentElement.scrollTop = top_count;
                  if(top_count < 3){
                    clearInterval(dec);
                    _docHeight = (document.height !== undefined) ? document.height : document.body.offsetHeight;
                  }
                  top_count-=5;
                }, 0.2);
}

topp.addEventListener("click", topFunction,false);

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY + 50) >= document.body.offsetHeight) {
        topp.style.bottom="81px";
	topp.style.zIndex=10;
    }
    else{
    	topp.style.bottom="44px";
	topp.style.zIndex=-10;
    }

}

function inpt1(){
  let first_name = document.getElementById("first_name");
  if(!isNaN(first_name.value)){
    first_name.value = "";
  }
}


</script>
</body>
</html>

<?php
db_disconnect($db);
?>