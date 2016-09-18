<?php

namespace Parser;
/**
 * Abstract parser: getting contents and returning all matching nodes
 *
 * @author Evgeniy Vasilev <github+dev@johnynsk.ru>
 */
class ParserAbstract
{

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

    /**
     * Returns all nodes matching path
     *
     * @param $html
     * @param $path
     * @return array
     */
    protected function _getAllNodes($html, $path)
    {
        $parser = new \PHPHtmlParser\Dom();

        $parser->load($html);
        $nodes = $parser->find($path);

        return $nodes;
    }

    /**
     * Returns content by url
     *
     * @param $url
     * @return mixed
     */
    protected function _getContent($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 5
        ]);

        return curl_exec($curl);
    }
}
