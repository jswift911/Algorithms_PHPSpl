<!DOCTYPE HTML>
<head>
</head>
<style>
a {
text-decoration: none;
color: black;
}

img {
margin-right: 10px;
}
</style>
<?php
echo "<img src='image/file.png' width='10'>";
$ddr = dirname($_GET['src']);



echo"<a href='?src=".$ddr."'>на уровень выше ...</a><br> ";
//путь директории по default
if ($_GET[src] == '' ) {
$dir = new DirectoryIterator("/");
} else {
$dir = new DirectoryIterator($_GET['src']);
}

echo"<br>".$dir."<br>";

// цикл по содержанию директории
foreach ($dir as $item) {

if (strpos($item, ".") === false) {
    echo "<img src='image/file.png' width='10'><a href='?src=".$_GET[src]."/".$dir."&item=".$item ."'>".$item."</a><br> ";
} else {
	if ($item == "." OR $item == "..") {
echo "";
} else {
    echo "<img src='image/file2.png' width='10'>".$item ."<br> ";
	}
}



}
?>