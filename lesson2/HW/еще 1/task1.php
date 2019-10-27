<?php

$path = $_GET['path'] ?: __DIR__;
$iterator = new DirectoryIterator($path);

$foldersHtml = '';
$filesHtml = '';

while ($iterator->valid()) {
$fileName = $iterator->getFilename();
$pathName = $iterator->getPathname();
if ($fileName === '..') {
$pathArr = explode(DIRECTORY_SEPARATOR, $path);
array_pop($pathArr);
$pathName = implode(DIRECTORY_SEPARATOR, $pathArr);
}
if ($iterator->isDir()) {
$foldersHtml .= "<a href='index.php?path={$pathName}'>
    <img src='img/folder.jpg' width='25'>
    {$fileName}
</a><br>";
} else {
$filesHtml .= "<span>{$fileName}</span><br>";
}
$iterator->next();
}

echo "<h4>{$path}</h4>";
echo $foldersHtml . $filesHtml;

