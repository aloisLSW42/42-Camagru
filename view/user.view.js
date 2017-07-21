console.log("user view js");

//cam

var video = document.getElementById("video");
var canvas = document.getElementById("canvas");

function display_button()
{
	document.getElementById("button_take").style.visibility="visible";
	document.getElementById("button_choose").style.visibility="visible";
}

function query(image, layer)
{
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
	    		console.log(this.responseText);
			window.location.href="./index.php?view=user";
		}
	};
	xhttp.open("POST", "./controller/user.controller.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("image="+encodeURIComponent(image)+"&layer="+layer);
}

function takeashot()
{
	document.getElementById("button_take").style.visibility="hidden";
	var context = canvas.getContext('2d');
	context.fillStyle = "#AAA";
	context.fillRect(0, 0, canvas.width, canvas.height);
	
	var data = canvas.toDataURL('image/png');
	
	context.drawImage(video, 0, 0, canvas.width, canvas.height);
	console.log("shot");
	var img = canvas.toDataURL('image/png');
	var layer = document.querySelector('input[name="layer"]:checked').value;	
	query(img, layer);
	
}

function start(stream)
{
	navigator.mediaDevices.getUserMedia({ video: {width: canvas.width, height: canvas.height}, audio: false }).then(function(stream)
	{
		video.srcObject = stream;
		video.play();
	}).catch(function(err)
	{
		console.log("An error occured! " + err);
	});
}


start();
