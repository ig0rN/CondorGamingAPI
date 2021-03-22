<?php

namespace Core\Responses;

use Core\Response;
use SimpleXMLElement;

class XmlResponse extends Response
{
    final protected function getData(): string
    {
        http_response_code($this->statusCode);
        header('Content-type: text/xml');

        $data = [
            $this->message      => 'message',
            'data'              => array_flip($this->data),
            $this->statusCode   => 'status_code'
        ];

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($data, array ($xml, 'addChild'));

        return $xml->asXML();
    }
}