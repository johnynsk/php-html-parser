<?php
$di = new Pimple\Container();

$di['htmlParser'] = function () {
    return new \PHPHtmlParser\Dom();
};

