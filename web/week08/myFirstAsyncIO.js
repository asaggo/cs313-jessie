//Asynchronous read
var fs = require('fs');
fs.readFile(process.argv[2],function (error, data){
	if (error){
		return console.error(error);
	}
	var str = data.toString();
	var strArray = str.split('\n');
	console.log(strArray.length - 1);
});



// you can check if an error occurred by checking whether the first  
//   argument is truthy. If there is no error, you should have your Buffer  
//   object as the second argument. As with readFileSync(), you can supply  
//   'utf8' as the second argument and put the callback as the third argument  
//   and you will get a String instead of a Buffer.