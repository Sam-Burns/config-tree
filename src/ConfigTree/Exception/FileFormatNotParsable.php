<?php
namespace ConfigTree\Exception;

class FileFormatNotParsable extends \RuntimeException
{
    public static function constructWithFilePath(string $path) : FileFormatNotParsable
    {
        $message = 'Config file "' . $path . '" is not of a format that can be parsed. Try .ini, .php, .json, or .yml.';
        return new static($message);
    }
}
