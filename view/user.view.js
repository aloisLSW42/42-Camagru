console.log("user view js");

//cam

var video = document.getElementById("video");
var canvas = document.getElementById("canvas");

function takeashot()
{
	var context = canvas.getContext('2d');
	context.fillStyle = "#AAA";
	context.fillRect(0, 0, canvas.width, canvas.height);
	
	var data = canvas.toDataURL('image/png');
	
	pic.setAttribute('src', data);

	video.setAttribute('width', '0%');
	video.setAttribute('height', '0%');
	context.drawImage(video, 0, 0, 100, 100);
	console.log("shot");	
}

function start(stream)
{
	navigator.mediaDevices.getUserMedia({ video: true, audio: false }).then(function(stream)
	{
		video.srcObject = stream;
		video.play();
	}).catch(function(err)
	{
		console.log("An error occured! " + err);
	});
}


start();
