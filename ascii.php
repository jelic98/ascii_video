<?php
$files = scandir("images");

foreach($files as $base) {
$file = "images/" . $base;

if(strpos($file, ".jpg") == 0) {
	continue;	
}

$img = imagecreatefromstring(file_get_contents($file));

list($width, $height) = getimagesize($file);

$scale = 10;

$chars = array(' ', '\'', '.', ':', '|', 'T',  'X', '0', '#');

$chars = array_reverse($chars);
$c_count = count($chars);

$content = "";

for($y = 0; $y <= $height - $scale - 1; $y += $scale) {
	for($x = 0; $x <= $width - ($scale / 2) - 1; $x += ($scale / 2)) {
		$rgb = imagecolorat($img, $x, $y);
		$r = (($rgb >> 16) & 0xFF);
		$g = (($rgb >> 8) & 0xFF);
		$b = ($rgb & 0xFF);
		$sat = ($r + $g + $b) / (255 * 3);
		
		$content .=  $chars[(int) ($sat * ($c_count - 1))];
	}
	
	$content .= "\n";
}

echo $content . "</br>";

$base = str_replace(".jpg", ".txt", $base);

$f = fopen("anim/" . $base, "w");
fwrite($f, $content);
fclose($f);
}
?>
