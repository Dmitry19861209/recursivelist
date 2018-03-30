<?php
namespace RecList\RecList;

/**
 * @author Derzhaev Dmitry
 * Абстрактный класс RecList представляет списки.
 */

abstract class RecList
{
    /**
     * Возвращает новый список с добавленным элементом.
     * @param $elem
     * @return RecList
     */
    abstract public function concatElem($elem): RecList;

    /**
     * Возвращает новый список, содержащий элементы обоих списков.
     * @param RecList $list
     * @return RecList
     */
    abstract public function concatList(RecList $list): RecList;

    /**
     * Возвращает новый список, отфильтрованный функцией предикатом
     * @param $func
     * @return RecList
     */
    abstract public function filter($func): RecList;

    /**
     * Применяет бинарный оператор к стартовому значению и всем
     * элементам этого списка, следуя слева направо.
     * @param $z
     * @param $op
     * @return mixed
     */
    abstract public function foldLeft($z, $op);

    /**
     * Применяет бинарный оператор ко всем элементам этого списка
     * и начального значения, следуя справа налево.
     * @param $z
     * @param $op
     * @return mixed
     */
    abstract public function foldRight($z, $op);

    /**
     * @param $n
     * @return mixed
     */
    abstract public function get($n);

    /**
     * Выбирает первый элемент этого списка.
     * @return mixed
     */
    abstract public function head();

    /**
     * Проверяет, является ли этот список пустым.
     * @return mixed
     */
    abstract public function isEmpty();

    /**
     * Длина списка
     * @return mixed
     */
    abstract public function length();

    /**
     * Создает новый список, применяя функцию ко всем элементам списка.
     * @param $func
     * @return mixed
     */
    abstract public function map($func);

    /**
     * Разбивает этот список на пару префикс / суффикс в соответствии с предикатом.
     * @param $p
     * @return mixed
     */
    abstract public function span($p);

    /**
     * Выбирает все элементы, кроме первого.
     * @return mixed
     */
    abstract public function tail();

    public function toArray()
    {

    }

    /* Внутренние функции */

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