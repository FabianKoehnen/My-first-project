<?php
use MyFirstProject\Adapter\csv;

class csvTest extends \PHPUnit\Framework\TestCase
{

    public function testread()
    {
        $csvArray=array(
    1=>array(
        'montag' => '1',
        'dienstag' => '2',
        'mittwoch' => '3'
    ),
    array(
        'montag' => '4',
        'dienstag' => '5',
        'mittwoch' => '6'
    ),
    array(
        'montag' => '7',
        'dienstag' => '8',
        'mittwoch' => '9'
    )
);
        $class = new csv();
        $testarray= $class->read("../csv/input.csv",";");
        $this->assertSame($csvArray,$testarray);

    }
    public function testcreate(){
        $class =new csv();
        $csvArray=array(
            1=>array(
                'montag' => '1',
                'dienstag' => '2',
                'mittwoch' => '3'
            ),
            array(
                'montag' => '4',
                'dienstag' => '5',
                'mittwoch' => '6'
            ),
            array(
                'montag' => '7',
                'dienstag' => '8',
                'mittwoch' => '9'
            )
        );
        $inputpath ="../csv/input.csv";
        $outputpath ="../csv/output.csv";
        $class->create($outputpath, $csvArray, ";");
        $this->assertFileEquals($inputpath,$outputpath);
    }
}


