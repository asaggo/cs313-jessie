var http = require('http');
var fs = require('fs');
var url =  require('url');
var server = http.createServer(onRequest);
server.listen(8888);

function onRequest(request, response){
	var myRequest = request.url;
	if (myRequest == '/home'){
		response.writeHead(200,{"content-type":"text/html"});
		response.write("<h1>Welcome to the home page</h1>");
		response.end();
	}
	else if (myRequest == '/getData'){
		response.writeHead(200,{"content-type":"application/json"});
		var temp = JSON.stringify({"Name":"Jessie Ji", "Class":"CS313"});
		response.write(temp);
		response.end();
	}
	else {
		response.writeHead(404, {"content-type":"text/html"});
		response.write("Page Not Found");
		response.end();
	}
}