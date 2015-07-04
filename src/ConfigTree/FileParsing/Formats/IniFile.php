<?php
namespace ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\ArrayableFile;
use ConfigTree\FileParsing\Reading\FileContentsRetriever;

class IniFile implements ArrayableFile
{
    /** @var string */
    private $path;

    /** @var FileContentsRetriever */
    private $fileContentsRetriever;

    /**
     * @param string                $path
     * @param FileContentsRetriever $fileContentsRetriever
     */
    public function __construct($path, FileContentsRetriever $fileContentsRetriever)
    {
        $this->path = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return parse_ini_string($fileContents);
    }
}
