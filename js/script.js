/* --- Работа с меню --- */
var btn = document.getElementById("menu-btn");
var btnAm = document.getElementById("menu-btn-am");
var menuSt = document.getElementById("menu-list-st");
var menuAm = document.getElementById("menu-list-am");

    btn.onclick = function(){
    		menuSt.style.display = "none";
    		menuAm.style.display = "flex";
    }

    btnAm.onclick = function(){
    		menuSt.style.display = "flex";
    		menuAm.style.display = "none";
    }


