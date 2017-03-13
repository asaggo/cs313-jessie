//Syncrhonous read
var fs = require('fs');
var data = fs.readFileSync(process.argv[2]); //readFileSync will return a Buffer object 
											 //containing the complete contents of the file.
var str = data.toString(); //Buffer objects can be converted to strings by toString method
var strArray = str.split('\n'); //String has .spilt() into an array of substrings

console.log(strArray.length-1);