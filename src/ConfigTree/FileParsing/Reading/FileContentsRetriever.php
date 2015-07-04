<?php
namespace ConfigTree\FileParsing\Reading;

use ConfigTree\Exception\FileNotReadable;

class FileContentsRetriever
{
    /**
     * @throws FileNotReadable
     *
     * @param string $path
     * @return string
     */
    public function fileGetContents($path)
    {
        if (!is_readable($path)) {
            throw FileNotReadable::constructWithPath($path);
        }
    }
}
