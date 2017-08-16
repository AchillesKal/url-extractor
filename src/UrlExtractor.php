<?php

namespace AchillesKal\UrlExtractor;

class UrlExtractor
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function extractUrl()
    {
        $this->removeScheme();
        $this->removeSubdomain();

        return  $this->url;
    }

    public function removeScheme()
    {
        $this->url = preg_replace("(^https?://)", "", $this->url );
        return $this;
    }

    public function removeSubdomain()
    {
        $parts = explode(".", $this->url);
        $host1 = $parts[count($parts)-2];
        $host2 = $parts[count($parts)-1];

        $this->url = $host1 . '.' .  $host2;
        return $this;
    }
}