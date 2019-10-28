<?php

$connect = mysqli_connect('localhost', 'root', '', 'alg') or die('Not connection');

$query = "SELECT * FROM categories";


$result = mysqli_query($connect, $query);
$cats = [];
while ($cat = mysqli_fetch_assoc($result)) {
	$cats[$cat['parent_id']][$cat['id']] = $cat;
}
mysqli_close($connect);

function buildTree ($cats, $parent_id) {

	if(is_array($cats) && isset($cats[$parent_id])) {
		$tree = "<ul>";
		foreach ($cats[$parent_id] as $cat) {
			$tree .= "<li>".$cat['name'];
			$tree .= buildTree($cats, $cat['id']);
			$tree .= "</li>";
		}
		$tree .="</ul>";
		return $tree;
	}
	}

echo  buildTree($cats, 0);
