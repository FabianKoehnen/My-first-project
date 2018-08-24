<?php
Namespace MyFirstProject\Interfaces;

interface Adapter {
    function create($path, $content, $delimiter=null);
    function read($path,$delimiter=null):array;
}