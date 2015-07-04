<?php
namespace ConfigTree\Exception;

class FileFormatNotParsable extends \RuntimeException
{
    /**
     * @param string $path
     * @return FileFormatNotParsable
     */
    public static function constructWithFilePath($path)
    {
        $message = 'Config file "' . $path . '" is not of a format that can be parsed. Try .ini, .php, .json, or .yml.';
        return new static($message);
    }
}
