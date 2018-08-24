<?php
include 'csv_adapter.php';
include 'xml_adapter.php';


$csvAdapter=new csvAdapter();
$xmlAdapter=new xmlAdapter();


$xmlAdapter->create("output/Gehege.xml",$csvAdapter->read("input/Gehege1.csv",";"));