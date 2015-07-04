<?php
namespace ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\ArrayableFile;

class PhpArrayFile implements ArrayableFile
{
    /** @var string */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return require $this->path;
    }
}
