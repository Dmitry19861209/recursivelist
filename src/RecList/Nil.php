<?php
namespace App\RecList;

/**
 * Пустой список. Расширяет абстрактный класс RecList.
 */

class Nil extends RecList
{
    public function tail()
    {
        throw new \Exception("Вызван метод tail() пустого списка");
    }

    public function get($n)
    {
        throw new \Exception("Вызван метод get() пустого списка");
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
        throw new \Exception("Вызван метод length() пустого списка");
    }

    public function map($func)
    {
        return $this;
    }

    public function span($p)
    {
        throw new \Exception("Вызван метод span() пустого списка");
    }
}