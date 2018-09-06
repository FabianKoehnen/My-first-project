<?php

use MyFirstProject\Adapter\xml;


class xmlTest extends \PHPUnit\Framework\TestCase
{
    public function testread()
    {
        $xmlArray = array(
            "montag" => array(
                "morgen" => '1'),

            "dienstag" => array(
                "mittag" => '2')

        );

        $class = new xml();
        $this->assertSame($xmlArray, $class->read("../xml/input.xml"));

    }

    public function testcreate()
    {
        $xmlArray = array(
            "montag" => array(
                "morgen" => 1),

            "dienstag" => array(
                "mittag" => 2)

        );
        $class = new xml();
        $outputpath = "../xml/output.xml";
        $class->create($outputpath, $xmlArray);
        $this->assertSame(file_get_contents("../xml/input.xml"), file_get_contents($outputpath));
    }
}
