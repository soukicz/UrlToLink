<?php
namespace Soukicz\TestUrlToLink;


use Soukicz\UrlToLink\Processor;

class ProcessorTest extends \PHPUnit_Framework_TestCase {
    function testDecodeSizes() {
        $link = new Processor();

        $this->assertEquals(
            'abc <a href="https://www.jadi.cz/Damska-obuv/Kotnickova-obuv/Podzim-zima/?f[v][]=40&f[p][313][]=571&f[cena_do]=3170">https://www.jadi.cz/Damska-obuv/Kotnickova-obuv/Podzim-zima/?f[v][]=40&f[p][313][]=571&f[cena_do]=3170</a> def <a href="https://jadi.cz">https://jadi.cz</a>',
            $link->convertUrlToLinksInHtml('abc https://www.jadi.cz/Damska-obuv/Kotnickova-obuv/Podzim-zima/?f[v][]=40&f[p][313][]=571&f[cena_do]=3170 def <a href="https://jadi.cz">https://jadi.cz</a>')
        );
    }
    function testHtmlEntities() {
        $link = new Processor();

        $this->assertEquals(
            'abc <a href="https://www.jadi.cz/?f[v][]=40&f[p]=571">https://www.jadi.cz/?f[v][]=40&amp;f[p]=571</a> def',
            $link->convertUrlToLinksInHtml('abc https://www.jadi.cz/?f[v][]=40&amp;f[p]=571 def')
        );
    }
    function testHtmlComma() {
        $link = new Processor();

        $this->assertEquals(
            'abc <a href="https://www.jadi.cz/">https://www.jadi.cz/</a>. def',
            $link->convertUrlToLinksInHtml('abc https://www.jadi.cz/. def')
        );

        $this->assertEquals(
            'abc <a href="https://www.jadi.cz/">https://www.jadi.cz/</a>, def',
            $link->convertUrlToLinksInHtml('abc https://www.jadi.cz/, def')
        );
    }
}
