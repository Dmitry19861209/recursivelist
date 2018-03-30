<?php
namespace RecList\RecList;

/**
 *  Строит списки. Расширяет абстрактный класс RecList.
 */

class Cons extends RecList
{
    private $head;
    private $tail;

    public function __construct($head, $tail)
    {
        $this->head = $head;
        $this->tail = $tail;
    }

    public function concatElem($elem): RecList
    {
        $this_ = $this->tail();
        return new Cons($this->head(), $this_->concatElem($elem));
    }

    public function concatList(RecList $list): RecList {
        $this_ = $this->tail();
        return new Cons($this->head(), $this_->concatList($list));
    }

    public function filter($func): RecList
    {
        $this_ = $this->tail();
        if ($func($this->head())) {
            return new Cons($this->head(), $this_->filter($func));
        } else return $this_->filter($func);
    }

    public function foldLeft($z, $op)
    {
        $this_ = $this->tail();
        return $this_->foldLeft($op($z, $this->head()), $op);
    }

    public function foldRight($z, $op)
    {
        $this_ = $this->tail();
        return $this_->foldRight($op($this->head(), $z), $op);
    }

    public function get($n)
    {
        if ($n >= $this->length()) return false;
        else return $this->loopWithIterator(0, $n, $this);
    }

    public function head()
    {
        return $this->head;
    }

    public function isEmpty()
    {
        return false;
    }

    public function length()
    {
        return $this->foldRight(0, function ($a, $b) {
            return $b + 1;
        });
    }

    public function map($func)
    {
        $this_ = $this->tail();
        return new Cons($func($this->head()), $this_->map($func));
    }

    public function span($p)
    {
        $b = [];
        $this_ = $this;

        while (!$this_->isEmpty() && $p($this_->head())) {
            $b[] = $this_->head();
            $this_ = $this_->tail();
        }

        return [recList($b), $this_];
    }

    public function tail()
    {
        return $this->tail;
    }
}