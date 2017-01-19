<?php
namespace ConfigTree\FileParsing\Reading;

use ConfigTree\Exception\FileNotReadable;

class FileContentsRetriever
{
    /**
     * @throws FileNotReadable
     */
    public function fileGetContents(string $path) : string
    {
        if (!is_readable($path)) {
            throw FileNotReadable::constructWithPath($path);
        }
        return file_get_contents($path);
    }
}
