var fs = require('fs');
var path = require('path');
fs.readdir(process.argv[2],function(error, list){
	if (error){
		return console.error(error);
	}
	var fileType = '.' + process.argv[3];
	for(i = 0; i < list.length; i++){
		if (path.extname(list[i]) == fileType){
			console.log(list[i]);
		}
	}
});

	// official solution!
    // var fs = require('fs')
    // var path = require('path')
    
    // var folder = process.argv[2]
    // var ext = '.' + process.argv[3]
    
    // fs.readdir(folder, function (err, files) {
    //   if (err) return console.error(err)
    //   files.forEach(function (file) {
    //     if (path.extname(file) === ext) {
    //       console.log(file)
    //     }
    //   })
    // })