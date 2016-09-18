<?php

namespace Parser;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Text matcher finder
 *
 * @author Evgeniy Vasilev <github+dev@johnynsk.ru>
 */
class Text extends ParserAbstract
{
    /**
     * Returns count of matches text
     *
     * @param $text
     * @param $url
     * @return array
     */
    public function matching($text, $url)
    {
        $content = $this->_getContent($url);
        $plaintext = HtmlDomParser::str_get_html($content)->plaintext;

        if (preg_match_all('#' . preg_quote($text) . '#ui', $plaintext, $matches)) {
            return count($matches[0]);
        }

        return 0;
    }
}
