<?php 
$directory = "";
$images = glob($directory . "*.jpg");

foreach($images as $image)
{
	echo "<p>$image</p><br>";
	echo "<img src='".$image."'>";
}
?>