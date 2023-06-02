<!DOCTYPE html>
<html>
<head>
	<style>
		img {
			width: 500px;
			height: 500px;
			border: 1px red solid;
		}
		h1 {
			color: Green;
		}
		body {
			background: white;
			margin-top: 4%;
			margin-left: 10%;
		}
	</style>
</head>
<body>
	<h1>GeeksforGeeks</h1>
	<h2>Creating 4 equal clickable areas in an image</h2>
	<img src="https://www.imgonline.com.ua/examples/snow.jpg" alt="usemap" usemap="#gfg_map" />
	<map name="gfg_map">
		<!-- dividing rectangle into 4 equal parts -->
		<area shape="rect"
			coords="0,0, 250,250"
			alt="GFG1"
			
			target="_blank" />
		<area shape="rect"
			coords="250,0, 500,250"
			alt="GFG2"
			
			target="_blank" />
		<area shape="rect"
			coords="0,250, 250,500"
			alt="GFG3"
			
			target="_blank" />
		<area shape="rect"
			coords="250,250, 500,500"
			alt="GFG4"
			
			target="_blank" />
	</map>
</body>

</html>