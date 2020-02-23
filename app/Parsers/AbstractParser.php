<?php

namespace App\Parsers;

use PHPHtmlParser\Dom;

abstract class AbstractParser
{
    /**
     * @var \PHPHtmlParser\Dom
     */
    protected $dom;

    protected function __constract()
    {
        $this->dom = new Dom;
        $this->dom->setOptions([
            'cleanupInput' => false,
        ]);
    }

    /**
     * setDom
     *
     * @param \PHPHtmlParser\Dom $dom
     */
    public function setDom(Dom $dom)
    {
        $this->dom = $dom;
    }

    abstract public function parse();
}
