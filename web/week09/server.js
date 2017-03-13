var express = require('express');
var app = express();
var url = require('url');
var bodyParser = require('body-parser');

app.set('port', (process.env.PORT || 8888));
app.use(express.static(__dirname + '/public'));

app.set('views',__dirname + '/views');
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({
	extended:false
}));

app.post('/display', function(request,response){
	var queryStr = url.parse(request.url, true).query;
	response.render('display',{
		answer:calcRate(request.body.weight, request.body.type)
	});
});

function calcRate(weight, type){
	var w = Number(weight);
	var answer = 0;

	switch (type){
		case 'postcard':
			answer = 0.34;
			break;
		case 'stampL':
			if (w <= 1)
				answer = 0.49;
			else if (w <= 2)
				answer = 0.70;
			else if (w <= 3)
				answer = 0.91;
			else if (w <= 3.5)
				answer = 1.12;
			else
				answer = -1;
			break;
		case 'meterL':
			if (w <= 1)
				answer = 0.46;
			else if (w <= 2)
				answer = 0.67;
			else if (w <= 3)
				answer = 0.88;
			else if (w <= 3.5)
				answer = 1.09;
			else
				answer = -1;
			break;
		case 'parcels':
			if (w <= 4)
				answer = 2.67;
			else if (w <= 5)
				answer = 2.85;
			else if (w <= 6)
				answer = 3.03;
			else if (w <= 7)
				answer = 3.21;
			else if (w <= 8)
				answer = 3.39;
			else if (w <= 9)
				answer = 3.57;
			else if (w <= 10)
				answer = 3.75;
			else if (w <= 11)
				answer = 3.93;
			else if (w <= 12)
				answer = 4.11;
			else if (w <= 13)
				answer = 4.29;
			else
				answer = -1;
			break;
		case 'envelopeL':
			if (w <= 1)
				answer = 0.98;
			else if (w <= 2)
				answer = 1.19;
			else if (w <= 3)
				answer = 1.40;
			else if (w <= 4)
				answer = 1.61;
			else if (w <= 5)
				answer = 1.82;
			else if (w <= 6)
				answer = 2.03;
			else if (w <= 7)
				answer = 2.24;
			else if (w <= 8)
				answer = 2.45;
			else if (w <= 9)
				answer = 2.66;
			else if (w <= 10)
				answer = 2.87;
			else if (w <= 11)
				answer = 3.08;
			else if (w <= 12)
				answer = 3.29;
			else if (w <= 13)
				answer = 3.50;
			else
				answer = -1;
	}


	if (answer >= 0)
		return answer;
	else
		return "Invalid";
}


app.listen(app.get('port'), function(){
	console.log('Node app is running on the port', app.get('port'));
});
