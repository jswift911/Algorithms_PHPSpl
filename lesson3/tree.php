<?php

$folder = "X:\Installation Files";

function readFolder($path) {
	if(!$dir = opendir($path)) {
		die("Папки не существует");
	};

	$filenames = [];
	while ($filename = readdir($dir)) {
		if ($filename != "." && $filename != "..") {
			if (is_dir("$path/$filename")) {
				$filename .= "/";
			}
			$filenames[] = $filename;
		}
	}

	closedir();
	sort($filenames);

	echo "<ul>";
	foreach ($filenames as $filename) {
		echo "<li>$filename";
		if (substr($filename, -1) == "/") {
			readFolder("$path/".substr($filename, 0, -1));

		}

		echo "</li>";
	}
	echo "</ul>";
}

readFolder($folder);