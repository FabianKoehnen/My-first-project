<?php

include_once 'Adapter.php';
class xmlAdapter implements Adapter
{
    public function read($path,$delimiter=null):array
    {

        $xml_file = file_get_contents($path);
        $xml = simplexml_load_string($xml_file);
        $json = json_encode($xml);
        $xml_array = json_decode($json, true);
        return $xml_array;
    }

    public function create($path, $content)
    {
        $xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><user_info></user_info>");

        $this->array_to_xml($content, $xml_user_info);

        $xml_user_info->asXML($path);

    }

    private function array_to_xml($content, $xml_user_info)
    {
        foreach ($content as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_user_info->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml_user_info->addChild("item$key");
                    $this->array_to_xml($value, $subnode);
                }
            } else {
                $xml_user_info->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}
