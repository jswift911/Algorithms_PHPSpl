<?php
$connect = mysqli_connect('localhost', 'root', '', 'alg');

$result = mysqli_query($connect, <<<SQL
SELECT * FROM category_links WHERE child_id = parent_id
SQL
);
if (mysqli_num_rows($result) > 0) {
    $parents = [];
    while ($parent = mysqli_fetch_assoc($result)) {
        $parents[$parent['parent_id']] = (int) $parent['level'];
    }
}

$result = mysqli_query($connect, <<<SQL
SELECT c.id_category, c.category_name as `name`, cl.parent_id, cl.level
FROM `categories` AS `c`
INNER JOIN `category_links` AS `cl` ON `c`.`id_category` = `cl`.`child_id`
SQL
);

if (mysqli_num_rows($result) > 0) {
    $cats = [];
    while ($cat = mysqli_fetch_assoc($result)) {
        $catId = $cat['id_category'];
        $parentId = $cat['parent_id'];
        $levelCat = (int) $cat['level'];
        if ($levelCat === 0) {
            $cats[0][$catId] = $cat;
        }
        if ($parents[$parentId] !== ($levelCat - 1)) {
            continue;
        }
        $cats[$parentId][$catId] = $cat;
    }
}
function build_tree($cats, $parent_id, $only_parent = false)
{

    if (!empty($cats[$parent_id])) {

        $tree = '<ul>';

        if ($only_parent === false) {
            foreach ($cats[$parent_id] as $cat) {

                $tree .= '<li>' . $cat['name'];
                $tree .= build_tree($cats, $cat['id_category']);
                $tree .= '</li>';

            }

        } elseif (is_numeric($only_parent)) {
            $cat = $cats[$parent_id][$only_parent];
            $tree .= '<li>' . $cat['name'];
            $tree .= build_tree($cats, $cat['id_category']);
            $tree .= '</li>';
        }

        $tree .= '</ul>';
    } else {
        return null;
    }
    return $tree;
}


echo build_tree($cats, 0);