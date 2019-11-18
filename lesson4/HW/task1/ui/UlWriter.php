<?php


namespace task1\ui;


class UlWriter {

    public static function printList(array $objects, $displayProperty = 'name') {
        $html = '<ul>';
        /** @var \task1\interfaces\treeable $object */
        foreach ($objects as $object) {
            $html .= '<li>';
            $html .= $object->$displayProperty;
            $childrens = $object->getChildrens();
            if (count($childrens)) {
                $html .= self::printList($childrens, $displayProperty);
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

}
