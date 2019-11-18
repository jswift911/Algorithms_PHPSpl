<?php
$connect = mysqli_connect('localhost', 'root', '', 'alg');

$result = mysqli_query($connect, <<<SQL
SELECT id, `title`, level, lft, rgt FROM tree ORDER BY lft
SQL
);

$categories = [];
if (mysqli_num_rows($result) > 0) {
    while ($element = mysqli_fetch_assoc($result)) {
        $categories[] = $element;
    }
}

function buildTree(array $categories, $key = 0, $prevLevel = 0)
{
    $tree = '';
    if (count($categories) > $key) {
        $category = $categories[$key];
        $level = (int) $category['level'];
        if ($level < $prevLevel) {
            $tree .= str_repeat('</ul>',$prevLevel - $level);
        }
        if ($level > $prevLevel) {
            $tree .= '<ul>';
        }
        $tree .= '<li>' . $category['title'];
        $tree .= buildTree($categories, $key + 1, $level);
        $tree .= '</li>';
    }
    return $tree;
}

echo buildTree($categories);