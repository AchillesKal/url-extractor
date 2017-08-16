<?php

namespace AchillesKal\UrlExtractorTests;

use AchillesKal\UrlExtractor\UrlExtractor;
use PHPUnit\Framework\TestCase;

class UrlExtractorTest extends TestCase
{
    public function testExtractUrl()
    {
        $urls = [
            'https://achilleskal.com',
            'http://achilleskal.com',
            'https://www.achilleskal.com',
            'http://www.achilleskal.com',
        ];

        foreach($urls as $url){
            $extractor = new UrlExtractor($url);
            $result = $extractor->extractUrl();

            $this->assertEquals('achilleskal.com', $result);
        }
    }

    public function testRemoveScheme()
    {
        $urls = [
            'https://achilleskal.com',
            'http://achilleskal.com',
        ];

        foreach($urls as $url){
            $extractor = new UrlExtractor($url);
            $result = $extractor->removeScheme();

            $this->assertEquals('achilleskal.com', $result->getUrl());
        }
    }

    public function testRemoveSubdomain()
    {
        $urls = [
            'https://www.achilleskal.com',
            'https://web.achilleskal.com',
            'http://test.real.achilleskal.com',
            'http://wuba.test.real.achilleskal.com',
        ];

        foreach($urls as $url){
            $extractor = new UrlExtractor($url);
            $result = $extractor->removeSubdomain();

            $this->assertEquals('achilleskal.com', $result->getUrl());
        }
    }
}