<?php

namespace Parser;

/**
 * Links parser
 *
 * @author Evgeniy Vasilev <github+dev@johnynsk.ru>
 */
class Links extends ParserAbstract
{
    public function parse($url)
    {
        $content = $this->_getContent($url);
        $nodes = $this->_getAllNodes($content, 'a');

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
}
