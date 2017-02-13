function sum(){
    var sum = 
        document.getElementById("firstItem").value*199.89 +
        document.getElementById("secondItem").value*49.79;
    
    sum = sum.toFixed(2);
    document.getElementById("price").innerHTML = sum;
}

function addedItem(){
    alert("Item has been added");
}