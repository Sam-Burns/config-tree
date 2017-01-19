<?php
namespace ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\ArrayableFile;

class PhpArrayFile implements ArrayableFile
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function toArray() : array
    {
        return require $this->path;
    }
}
