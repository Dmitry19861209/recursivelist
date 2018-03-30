<?php

use PHPUnit\Framework\TestCase;

class RecTest extends TestCase
{
    protected function numList() { return recList([1, 2, 3]); } // var_dump($list->head());exit;

    /* Получить значение списка по индексу */
    function testListGetByIndex()
    {
        $this->assertEquals($this->numList()->get(1), 2);
    }

    /* Соединить два списка */
    function testConcatTwoList()
    {
        $obj = $this->numList()->concatList(recList([4, 5, 6]));
        $this->assertEquals($obj->get(3), 4);
    }

    /* Добавить элемент в список */
    function testConcatElem()
    {
        $obj = $this->numList()->concatElem(4);
        $this->assertEquals($obj->get(3), 4);
    }

    /* Вернуть первый элемент списка */
    function testListHead()
    {
        $this->assertEquals($this->numList()->head(), 1);
    }

    /*  */
    function testMapMethod()
    {
        $result = $this->numList()->map(function ($i) {
            return $i * 2;
        });
        $this->assertEquals($result->head(), 2);
    }

    function testFoldLeftMethod()
    {
        $result = $this->numList()->foldLeft(1, function ($a, $b) {
            return $a + $b;
        });
        $this->assertEquals($result, 7);
    }

    function testFoldRightMethod()
    {
        $result = $this->numList()->foldRight(0, function ($a, $b) {
            return $a + $b;
        });
        $this->assertEquals($result, 6);
    }

    function testFilterMethod()
    {
        $result = $this->numList()->filter(function ($i) {
            return $i >= 2;
        });
        $this->assertEquals($result->head(), 2);
    }

    function testFoldLeftArray()
    {
        $result = $this->numList()->foldLeft([], function ($a, $b) {
            $a[] = $b * 2;
            return $a;
        });
        $this->assertEquals($result[0], 2);
    }
}