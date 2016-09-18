<?php

require_once dirname(__DIR__) . '/scripts/bootstrap.php';

if (isset($_GET['link'])) {
    echo '<html><body><a href="http://localhost"><img src="http://localhost:21" /><strong>test</strong>notsenior</a></body></html>';
    return;
}

$parser = new Parser\Images();
var_dump($parser->getLinks('http://johnynsk.ru:8801?link=1'));


//$parser = new \PHPHtmlParser\Dom();
//$contents = file_get_contents('http://johnynsk.ru:8801?link=1');
//$parser->load($contents);
/** @var \PHPHtmlParser\Dom\HtmlNode[] $tags */
//$tags = $parser->find('a');
//var_dump($tags);/
//var_dump($tags[0]->text);
//var_dump($tags[0]->textWithChildren);
//var_dump(array_keys((array)$tags[0]));//->innerHtml);
//var_dump($tags[0]->getAttributes());
//var_dump(array_keys((array)$parser->find('a')[0]));

