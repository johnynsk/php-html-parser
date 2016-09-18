<?php
$di = new Pimple\Container();

$di['htmlParser'] = function () {
    return new \PHPHtmlParser\Dom();
};

$di['fileLocator'] = function () {
    return new \Symfony\Component\Config\FileLocator([__DIR__, dirname(__DIR__) . '/scripts']);
};

$di['yamlLoader'] = function () use ($di) {
    return new \Symfony\Component\Routing\Loader\YamlFileLoader($di['fileLocator']);
};

$di['router'] = function () use ($di) {

};
