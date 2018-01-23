<?php
/**
 * Пустой список. Расширяет абстрактный класс RecList.
 */

namespace App\RecList;


class Nil extends RecList
{
    public function isEmpty()
    {
       return true;
    }

    public function head()
    {
       throw new \Exception("Вызван метод head() пустого списка");
    }

    public function tail()
    {
        throw new \Exception("Вызван метод tail() пустого списка");
    }
}