<?php
/**
 *  Строит списки. Расширяет абстрактный класс RecList.
 */

namespace App\RecList;


class Cons extends RecList
{
    private $head;
    private $tail;

    public function __construct($head, $tail)
    {
        $this->head = $head;
        $this->tail = $tail;
    }

    public function isEmpty()
    {
        return false;
    }

    public function head()
    {
        return $this->head;
    }

    public function tail()
    {
        return $this->tail;
    }
}