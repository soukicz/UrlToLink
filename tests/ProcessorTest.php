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
}
