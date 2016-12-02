<?php
namespace Soukicz\UrlToLink;

class Processor {
    /**
     * @param string $html
     * @return string
     */
    public function convertUrlToLinksInHtml($html) {
        $html = preg_replace_callback('~(<a .*?>.*?</a>)~i', function (array $match) {
            return '<<<a<' . base64_encode($match[0]) . '>>>>';
        }, $html);

        $html = preg_replace_callback('~(<img .*?>)~i', function (array $match) {
            return '<<<i<' . base64_encode($match[0]) . '>>>>';
        }, $html);

        $html = preg_replace_callback('~https?://[a-z0-9/.\?&=%#\[\]_+\-]+~i', function (array $match) {
            return '<a href="' . $match[0] . '">' . $match[0] . '</a>';
        }, $html);

        $html = preg_replace_callback('~<<<[ai]<(.*?)>>>>~', function (array $match) {
            return base64_decode($match[1]);
        }, $html);

        return $html;
    }
}
