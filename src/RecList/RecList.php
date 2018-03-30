<?php
namespace RecList\RecList;

/**
 * @author Derzhaev Dmitry
 * Абстрактный класс RecList представляет списки.
 */

abstract class RecList
{
    /**
     * Возвращает новый список, содержащий элементы обоих списков.
     */
    abstract public function concat($list): RecList;

    abstract public function concatList(RecList $list): RecList;

    abstract public function filter($func);

    abstract public function foldLeft($z, $op);

    abstract public function foldRight($z, $op);

    abstract public function get($n);

    abstract public function head();

    abstract public function isEmpty();

    abstract public function length();

    abstract public function map($func);

    abstract public function span($p);

    abstract public function tail();

    public function toArray()
    {

    }

    /* Внутренние функции */
//    private function loopAcc($th, $acc)
//    {
//        if ($this->isNil($this)) {
//            return $acc;
//        } else return $this->loopAcc($th->tail(), ++$acc);
//    }

    protected function isNil($this_)
    {
        return (get_class($this_) === "RecList\RecList\Nil");
    }

    protected function isCons($this_)
    {
        return (get_class($this_) === "RecList\RecList\Cons");
    }

    protected function loopWithIterator($i, $n, $list) {
        if ($i === $n) return $list->head();
        else return $this->loopWithIterator($i + 1, $n, $list->tail());
    }
}