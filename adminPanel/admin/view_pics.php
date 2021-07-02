<?php
echo "<center>";
$dirname = "images/";
$images = scandir($dirname);
$ignore = Array(".", "..");
foreach($images as $curimg){
    if(!in_array($curimg, $ignore)) {
        echo "<img src='images/$curimg' width = 250 height = 150 /><br>\n";
    }
}
          echo "</center>";
?>
<?php

if(isset($_POST['cover_up']))
{

$imgFile = $_FILES['coverimg']['name'];
$tmp_dir = $_FILES['coverimg']['tmp_name'];
$imgSize = $_FILES['coverimg']['size'];

if(!empty($imgFile))
{

$upload_dir = 'images/'; 

$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

$coverpic = rand(1000,1000000).".".$imgExt;


if(in_array($imgExt, $valid_extensions))
{

echo "<center>";
if($imgSize < 5000000)
{
move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
header('location:view_pics.php');
echo "Yükleme Tamamlandı";
}
else{
$errMSG = "Dosya, boyut sınırının üzerinde.";
}
}
else{
$errMSG = "Sadece JPG, JPEG, PNG & GIF dosya türlerinde upload iznin var.";
}
}
}
echo "</center>";
?>
<!DOCTYPE html>
<html>
<center>
<head>
<title></title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
<p><input type="file" name="coverimg" required="required" /></p>
<p><input type="submit" name="cover_up" style="background-color: rgb(255, 102, 0);" class="btn btn-warning" value="Yükle"/></p>
</form>
</body>
</center>
</html>
