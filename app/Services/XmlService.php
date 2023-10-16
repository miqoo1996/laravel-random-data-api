<?php

namespace App\Services;

use Illuminate\Http\Response;
use SimpleXMLElement;

class XmlService
{
    private SimpleXMLElement $xml;

    public function __construct()
    {
        $this->xml = new SimpleXMLElement("<data></data>");
    }

    public function createXmlResponse($data): Response
    {
        $this->arrayToXml($data, $this->xml);

        return response($this->xml->asXML(), 200)->header('Content-Type', 'application/xml');
    }

    protected function arrayToXml($data, &$xml): void
    {
        foreach ($data as $item) {
            $element = $xml->addChild('item');
            foreach ($item as $key => $value) {
                $element->addChild($key, htmlspecialchars($value));
            }
        }
    }


}
