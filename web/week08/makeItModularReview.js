var myModule = require('./modReview');
var directory = process.argv[2];
var extension = process.argv[3];

myModule(directory,extension,function(err,data){
	if (err){
		return console.error(err);
	}

	for (i = 0; i < data.length; i++){
		console.log(data[i]);
	}
});