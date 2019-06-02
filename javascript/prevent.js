let mobile = document.getElementById('mobile');
mobile.addEventListener('keyup', insert_only_number);
 
function insert_only_number(e) {
        // e.preventDefault();
        // mobile.value = "";
        if (/\D/g.test(this.value)){
        	this.value = this.value.replace(/\D/g,'');
    }  
}


function inpt1(){
  let first_name = document.getElementById("first_name");
  if(!isNaN(first_name.value)){
    first_name.value = "";
  }
}
function inpt2(){
  let first_name = document.getElementById("first_name");
  if(!isNaN(first_name.value)){
    first_name.value = "";
  }
}

