function clicked(){
	alert("clicked!");
}

function changeColor(){
    var color = document.getElementById("color").value;
    document.getElementById("div1").style.backgroundColor = color;
}

function changeBGC(){
    var color = $("#color").val();
    $("#div1").css("background-color",color);
}

function toggle(){
    $("#div3").fadeToggle(3000);
}