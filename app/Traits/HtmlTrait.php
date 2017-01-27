<?php

namespace App\Traits;

trait HtmlTrait
{

    /**
     * Generate HTML element.
     *
     * @param string $tag Tag name.
     * @param array $attributes Associative array with element attributes.
     * @param string $innertext Element inner text.
     *
     * @return string
     */
    public function createHtmlElement(
        string $tag = 'div',
        array $attributes = [],
        string $innertext = null
    ) : string {
        $ret = '<'.trim($tag);

        foreach ($attributes as $attr_name => $attr_value) {
            $ret .= ' '.htmlspecialchars(trim($attr_name)).'="'.htmlspecialchars($attr_value).'"';
        }

        $ret .= '>';

        if (empty($innertext) === false) {
            $ret .= $innertext;
        }

        if ($innertext !== null) {
            $ret .= '</' . trim($tag) . '>';
        }

        return $ret;
    }
}