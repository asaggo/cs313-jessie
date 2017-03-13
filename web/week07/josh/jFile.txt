function toggleView(elem1, elem2){
    
    elem1.style.display = "none";
    elem2.style.display = "block";
}

//var email= /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

function hover(x){
    x.style.padding = '12px';
    x.style.fontSize = '14px';
    x.style.marginBottom = '4px';
}
function unhover(x){
    x.style.padding = '10px';
    x.style.fontSize = '12px';
    x.style.margin = '10px';
}

function date(x){
    
    var day = getDate();
    if (day < 10){
        day = '0' + String(day);
    }
    else 
        day = Sting(day);
    
    var month = getMonth();
    if (month < 10){
        month = '0' + String(month);
    }
    else 
        month = Sting(month);
    
    var year = String(getFullYear());
    
    var date = year + '-' + day + '-' + month;
    
    x.value = date;
    
}