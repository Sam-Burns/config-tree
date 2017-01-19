<?php
namespace ConfigTree\Exception;

class FileNotReadable extends \RuntimeException
{
    public static function constructWithPath(string $path) : FileNotReadable
    {
        $message = 'Config file "' . $path . '" could not be read';
        return new static($message);
    }
}
