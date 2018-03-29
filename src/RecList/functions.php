<?php
/**
 * @author Derzhaev Dmitry
 * @example
 * Эта функция представлена в роли объекта-компаньона для RecList.
 */

use RecList\RecList\Cons;
use RecList\RecList\Nil;

if (! function_exists('recList')) {

    /**
     * @param array $array
     * @return \RecList\RecList\RecList
     * */
    function recList(array $array)
    {
        if (!count($array)) {
            return new Nil;
        }

        return new Cons(array_shift($array), recList($array));
    }
}