<?php

namespace Parser;

/**
 * Images parser
 *
 * @author Evgeniy Vasilev <github+dev@johnynsk.ru>
 */
class Images extends ParserAbstract
{
    public function parse($url)
    {
        $content = $this->_getContent($url);
        $nodes = $this->_getAllNodes($content, 'img');

        $result = [];

        foreach ($nodes as $node) {
            $attributes = $node->getAttributes();

            if (!isset($attributes['src'])) {
                continue;
            }

            $result[] = [
                'src' => $attributes['href'],
                'alt' => !empty($attributes['alt']) ? $attributes['alt'] : null
            ];
        }

        return $result;
    }
}
