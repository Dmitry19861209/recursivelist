<?php
namespace App\RecList;

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

    public function get($n)
    {
        if ($this->isNil($this) || $n >= $this->length()) {
            return $this;
        } else {
            function loop($i, $n, $list) {
                if ($i === $n) return $list->head();
                else return loop($i + 1, $n, $list->tail());
            }
            return loop(0, $n, $this);
        }
    }

    public function length()
    {
        return $this->foldRight(0, function ($a, $b) {
            return $b + 1;
        });
    }

    public function map($func)
    {
        if ($this->isNil($this)) {
            return $this;
        } else {
            $this_ = $this->tail();
            return new Cons($func($this->head()), $this_->map($func));
        }
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
}