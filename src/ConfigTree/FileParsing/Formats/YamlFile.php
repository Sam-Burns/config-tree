<?php
namespace ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\ArrayableFile;
use ConfigTree\FileParsing\Reading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;

class YamlFile implements ArrayableFile
{
    /** @var string */
    private $path;

    /** @var FileContentsRetriever */
    private $fileContentsRetriever;

    /** @var YamlParser */
    private $yamlParser;

    /**
     * @param string                $path
     * @param FileContentsRetriever $fileContentsRetriever
     * @param YamlParser            $yamlParser
     */
    public function __construct($path, FileContentsRetriever $fileContentsRetriever, YamlParser $yamlParser)
    {
        $this->path                  = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
        $this->yamlParser            = $yamlParser;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return $this->yamlParser->parse($fileContents);
    }
}
