<?php
namespace ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\ArrayableFile;
use ConfigTree\FileParsing\Reading\FileContentsRetriever;

class JsonFile implements ArrayableFile
{
    /** @var string */
    private $path;

    /** @var FileContentsRetriever */
    private $fileContentsRetriever;

    public function __construct(string $path, FileContentsRetriever $fileContentsRetriever)
    {
        $this->path = $path;
        $this->fileContentsRetriever = $fileContentsRetriever;
    }

    public function toArray() : array
    {
        $fileContents = $this->fileContentsRetriever->fileGetContents($this->path);
        return json_decode($fileContents, true);
    }
}
