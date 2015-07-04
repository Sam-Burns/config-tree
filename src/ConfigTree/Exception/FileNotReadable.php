<?php
namespace ConfigTree\Exception;

class FileNotReadable extends \RuntimeException
{
    /**
     * @param string $path
     * @return FileNotReadable
     */
    public static function constructWithPath($path)
    {
        $message = 'Config file "' . $path . '" could not be read';
        return new static($message);
    }
}
