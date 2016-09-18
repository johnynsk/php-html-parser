<?php
namespace Parser;
class Page
{
    protected $_metadata;



    public function run()
    {
//        if (is_callable([$this, ']))
        $response = ['metadata' => $this->_metadata, 'result' => []];
        header("Content-type: application/json");
        return json_encode($response);
    }
}