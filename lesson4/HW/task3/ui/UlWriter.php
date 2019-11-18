<?php

/*
 *  If this code works then Fuchko Nikita wrote it, if not then I do not know who did it ... ^-^
 */

namespace task3\ui;

class UlWriter {

    public static function printList(array $objects) {
        $html = '<ul>';
        /** @var \task3\interfaces\treeable $object */
        foreach ($objects as $object) {
            $html .= '<li>';
            $html .= $object;
            $childrens = $object->getChildrens();
            if (count($childrens)) {
                $html .= self::printList($childrens);
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

}
