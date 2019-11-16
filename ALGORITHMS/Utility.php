<?php


$filename="myfile.txt";
$file = fopen($filename,"r");
if($file == false){
    echo "Error in opening file.\n";
    exit();
}
$size=filesize($filename);
$text=fread($file,$size);
fclose($file);

echo "Size of file is. ".$size."\n";
echo $text;
?>
