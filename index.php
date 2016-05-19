<!--
Page Name: Image Creator
Written By: Joshua Leihe
All rights reserved :)
-->
<!DOCTYPE html PUBLIC "-//DTD XHTML 1.0 Transitional//EN"
"html://www.w3.org:/TR/xhtm1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Image Creator</title>
	<?php include('vars.php'); ?>
	<!--
	<link rel="stylesheet" type="text/css" href="/styles/general.css" />
	<link rel="stylesheet" type="text/css" href="/styles/newImage.css" />
	-->
	<link rel="stylesheet" type="text/css" href="<?php echo $imageCreatorStyleSrc ?>" />
	
	<script type="text/javascript">
	function save() {
		var canvas = document.getElementById("image");  
		var dataURL = canvas.toDataURL();
		document.getElementById('cloudimage').src = dataURL;
		var imageInput = document.getElementById('imagesubmit');
		imageInput.value = dataURL;
		
	}
	function draw() {  
		var canvas = document.getElementById("image");  
		var ctx = canvas.getContext("2d"); 
		var imageObj = new Image();
		imageObj.src = './images/Equanetlogo.jpg';
		ctx.drawImage(imageObj, 50, 50);
		
	}
	
	function clear() {
		alert("Hello");
    	var s = document.getElementById ("image");
    	s.clearRect(0,0,s.width,s.height);
	}
	
	function doSomething(e) {
		var posx = 0;
		var posy = 0;
		if (!e) var e = window.event;
		if (e.pageX || e.pageY) 	{
			posx = e.pageX;
			posy = e.pageY;
		}
		else if (e.clientX || e.clientY) 	{
			posx = e.clientX + document.body.scrollLeft
				+ document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop
				+ document.documentElement.scrollTop;
		}
	// posx and posy contain the mouse position relative to the document
	// Do something with this information
	}
	function saveImage() {
		var dataURL = document.getElementById("image").toDataURL();
		var params = "dataURL=" + encodeURIComponent(dataURL);

		var request = new XMLHttpRequest();
		request.open("POST", "saveImage.php", true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		window.console.log(dataURL);    

		request.onreadystatechange = function () {
			if (request.readyState === 4 && request.status === 200) {
				window.console.log(request.responseText);
			}
		};

		request.send(params);
	}

	</script>
</head>

<body>
	<canvas id="image" width="500" height="500" onclick="draw()" onrightclick="clear()">
		Your browser does not support the canvas element.
	</canvas>
	<img id="cloudimage" alt="cloud image" />
	<script>
		var canvas = document.getElementById("image");  
		var ctx = canvas.getContext("2d"); 
		var imageObj = new Image();
		imageObj.onload = function() {
			var imageWidth = imageObj.width/2;
			var imageHeight = imageObj.height/2;
        	ctx.drawImage(imageObj, 10, 10, imageWidth, imageHeight);
        	ctx.drawImage(imageObj, 200, 10, imageWidth, imageHeight);
        	ctx.drawImage(imageObj, 10, 300, imageWidth, imageHeight);
        	ctx.drawImage(imageObj, 200, 300, imageWidth, imageHeight);
      	};
	</script>
      	<?php 
			echo "<script>";
			echo "imageObj.src=\"$image01\";";
		?>
	</script>
	<button type="button" onclick="saveImage()">SaveImage!</button>
	<!--
	<form id="upload" action="saveImage.php" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value=100000>
		<input id="imagesubmit" type="hidden" name="imagesubmit">
		<input type="submit" value="Submit Label Selection" onclick="saveImage()" name="submit">
	</form>
	-->
</body>

</html>
