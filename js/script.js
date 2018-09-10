$('.menu-btn').on('click', function(e) {
	  e.preventDefault();
	  $('.menu').toggleClass('menu_active');
	  $('.content').toggleClass('content_active');
	})
	$('.menu-btn').on('click', function(e) {
	  e.preventDefault;
	  $(this).toggleClass('menu-btn_active');
	});
	var btn1 = document.getElementById("gr1");
	var hid1 = document.getElementById("hidgr1");
	var btn2 = document.getElementById("gr2");
	var hid2 = document.getElementById("hidgr2");
	var btn3 = document.getElementById("gr3");
	var hid3 = document.getElementById("hidgr3");

	btn1.onclick = function(event){
		if (hid1.style.display == "flex")
    		hid1.style.display = "none";
    	else{
    		hid1.style.display = "flex";
    		hid2.style.display = "none";
    		hid3.style.display = "none";
    	}
    }
    btn2.onclick = function(event){
		if (hid2.style.display == "flex")
    		hid2.style.display = "none";
    	else{
    		hid1.style.display = "none";
    		hid2.style.display = "flex";
    		hid3.style.display = "none";
    	}
    }
    btn3.onclick = function(event){
		if (hid3.style.display == "flex")
    		hid3.style.display = "none";
    	else{
    		hid1.style.display = "none";
    		hid2.style.display = "none";
    		hid3.style.display = "flex";
    	}
    }