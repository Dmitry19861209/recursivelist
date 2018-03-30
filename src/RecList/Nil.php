<?php
namespace RecList\RecList;

/**
 * Пустой список. Расширяет абстрактный класс RecList.
 */

class Nil extends RecList
{
    public function concat($x): RecList
    {
        throw new \Exception("Вызван метод concat() пустого списка");
    }

    public function concatList(RecList $list): RecList {
        if ($this->isNil($list)) return new Nil;
        else return $list->concatList(new Nil);
    }

    public function filter($func)
    {
        return $this;
    }

    public function foldLeft($z, $op)
    {
        return $z;
    }

    public function foldRight($z, $op)
    {
        return $z;
    }

    public function get($n)
    {
        return false;
    }

    public function head()
    {
        throw new \Exception("Вызван метод head() пустого списка");
    }

    public function isEmpty()
    {
        return true;
    }

    public function length()
    {
        return 0;
    }

    public function map($func)
    {
        return $this;
    }

    public function span($p)
    {
        throw new \Exception("Вызван метод span() пустого списка");
    }

    public function tail()
    {
        throw new \Exception("Вызван метод tail() пустого списка");
    }
}