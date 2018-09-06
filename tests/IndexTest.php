<?php

class IndexTest extends \PHPUnit\Framework\TestCase
{
    public function testIndex()
    {
        $class = new \MyFirstProject\Index();
        $this->assertSame(
            'test',
            $class->test()
        );
    }
}