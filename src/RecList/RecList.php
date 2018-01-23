<?php
/**
 * @author Derzhaev Dmitry
 * Абстрактный класс RecList, подобно спискам из scala.
 */

namespace App\RecList;


abstract class RecList
{
    public function concat($x)
    {
        if ($this->isNil($this)) {
            $this_x = $x;
            if (gettype($this_x) !== "object") {
                return new Cons($this_x, new Nil);
            } else if ($this->isCons($this_x)) {
                $this_ = $this_x->tail();
                return new Cons($this_x->head(), $this_->concat($this_->tail()));
            } else return new Nil;
        } else {
            $this_ = $this->tail();
            return new Cons($this->head(), $this_->concat($x));
        }
    }

    public function filter($func)
    {
        if ($this->isNil($this)) {
            return $this;
        } else {
            $this_ = $this->tail();

            if ($func($this->head())) {
                return new Cons($this->head(), $this_->filter($func));
            } else return $this_->filter($func);
        }
    }

    public function foldLeft($z, $op)
    {
        if ($this->isNil($this)) {
            return $z;
        } else {
            $this_ = $this->tail();
            return $this_->foldLeft($op($z, $this->head()), $op);
        }
    }

    public function foldRight($z, $op)
    {
        if ($this->isNil($this)) {
            return $z;
        } else {
            $this_ = $this->tail();
            return $this_->foldRight($op($this->head(), $z), $op);
        }
    }

    abstract protected function head();

    abstract protected function isEmpty();

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

    abstract protected function tail();

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

    private function isNil($this_)
    {
        return (get_class($this_) === "App\RecList\Nil");
    }

    private function isCons($this_)
    {
        return (get_class($this_) === "App\RecList\Cons");
    }

}