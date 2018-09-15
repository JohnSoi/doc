var zal = document.getElementById("zal");
var typeZal = document.getElementById("typeZal");

zal.oninput = function(){
		if (zal.value != 0)
			typeZal.style.display = "block";
		else 
			typeZal.style.display = "none";
    }