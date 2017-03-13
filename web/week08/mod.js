var fs = require('fs');
var path = require('path');

module.exports = function (dir, filterStr, callback) {
  fs.readdir(dir, function (err, list) {
    if (err) {
      return callback(err);
    }

    list = list.filter(function (file) {
      return path.extname(file) === '.' + filterStr; //if it returns true, keep it in list (filtering)!!
    }) //readdir function ends

    callback(null, list);
  })
}