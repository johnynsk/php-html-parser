<?php

namespace Parser;


class Links
{
    public function getContent($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 5
        ]);

        return curl_exec($curl);
    }

    public function getLinks($url)
    {
        $content = $this->getContent($url);
        $nodes = $this->getAllNodes($content);

        $result = [];

        foreach ($nodes as $node) {
            $attributes = $node->getAttributes();

            if (!isset($attributes['href'])) {
                continue;
            }

            $result[] = [
                'href' => $attributes['href'],
                'text' => !empty($node->text) ? $node->text : null
            ];
        }

        return $result;
    }

    public function getAllNodes($html)
    {
        $parser = new \PHPHtmlParser\Dom();

        $parser->load($html);
        $nodes = $parser->find('a');

        return $nodes;
    }
}
