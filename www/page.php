<?php

require_once dirname(__DIR__) . '/scripts/bootstrap.php';

$parser = new \PHPHtmlParser\Dom();
$contents = file_get_contents('http://johnynsk.ru/');
$parser->load($contents);
/** @var \PHPHtmlParser\Dom\HtmlNode[] $tags */
$tags = $parser->find('a');
var_dump($tags[0]->getAttributes());
var_dump(array_keys((array)$parser->find('a')[0]));

