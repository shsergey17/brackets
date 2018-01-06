<?php
use shsergey17\brackets\Brackets;
use shsergey17\brackets\EmptyException;

class BracketsTest extends PHPUnit_Framework_TestCase
{
    public function testTrue()
    {
        $brakets_true = "((()))";
        $this->assertTrue(Brackets::check($brakets_true));
    }

    public function testFalse()
    {
        $brakets_false = ")()";
        $this->assertFalse(Brackets::check($brakets_false));
    }

    public function testInvalidArgumentException()
    {
        $brakets_invalid = "((99))";
        $this->expectException(\InvalidArgumentException::class);
        Brackets::check($brakets_invalid);
    }

    public function testAllowSymbols()
    {
        $alow_symbols = "\t\n() \r";
        $this->assertTrue(Brackets::check($alow_symbols));
    }

    public function testEmpty()
    {
        $empty = null;
        $this->expectException(EmptyException::class);
        Brackets::check($empty);
    }
}