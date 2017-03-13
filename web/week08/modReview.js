var fs = require('fs');
var path = require('path');

module.exports = function(dir, ext, callback){
	fs.readdir(dir,function(error,data){
		if (error)
			return callback(error);
		var fullExtension = '.' + ext;
		for (i = 0; i < data.length; i++){
			if (path.extname(data[i]) == fullExtension)
				return true; //why???
		}
	callback(null,data);
	})


}