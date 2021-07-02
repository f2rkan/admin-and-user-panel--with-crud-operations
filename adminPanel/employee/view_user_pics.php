<?php
echo "<center>";
$dirname = "../admin/images/";
$images = scandir($dirname);
$ignore = Array(".", "..");
foreach($images as $curimg){
    if(!in_array($curimg, $ignore)) {
        echo "<img src='../admin/images/$curimg' width = 250 height = 150 /><br>\n";
    }
}
          echo "</center>";
?>