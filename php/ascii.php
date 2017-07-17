<?php
ini_set('max_execution_time', '300');
ini_set('memory_limit', '4G');

include("Processor.php");
include("Result.php");
include("BlackWhiteResult.php");
include("ColorResult.php");

use Img2Ascii\Processor;

$anims = scandir("anim");

foreach($anims as $anim){
 	 if(is_file($anim)) {
	 	unlink("anim/" . $anim);
  	}
}

$i = 0;

$files = scandir("images");

foreach($files as $base) {
$file = "images/" . $base;

if(strpos($file, ".jpg") == 0 
	&& strpos($file, ".png") == 0 
	&& strpos($file, ".gif") == 0)  {
	continue;	
}

$processor = new Processor($file);

$processor
    ->asciify(5)                    
	->asciifyToWidth(100) 
	->result('#@WMNXBRD8OZ$7I?wmxbq+=~:,.')
	->writeFile('anim/' . ++$i . '.txt');
}
?>
