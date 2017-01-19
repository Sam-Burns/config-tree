<?php
namespace ConfigTree\FileParsing;

use ConfigTree\Exception\FileFormatNotParsable;
use ConfigTree\FileParsing\Formats\IniFile;
use ConfigTree\FileParsing\Formats\JsonFile;
use ConfigTree\FileParsing\Formats\PhpArrayFile;
use ConfigTree\FileParsing\Formats\YamlFile;
use ConfigTree\FileParsing\Reading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;

class ArrayableFileFactory
{
    /**
     * @throws FileFormatNotParsable
     */
    public function getArrayableFileFromPath(string $pathToFile) : ArrayableFile
    {
        $fileExtension = pathinfo($pathToFile)['extension'];

        switch ($fileExtension) {
            case ('ini'):
                return $this->buildIniArrayableFile($pathToFile);
            case ('php'):
                return $this->buildPhpArrayableFile($pathToFile);
            case ('json'):
                return $this->buildJsonArrayableFile($pathToFile);
            case ('yaml'):
                return $this->buildYamlArrayableFile($pathToFile);
            case ('yml'):
                return $this->buildYamlArrayableFile($pathToFile);
            default:
                throw FileFormatNotParsable::constructWithFilePath($pathToFile);
        }
    }

    private function buildIniArrayableFile(string $path) : IniFile
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new IniFile($path, $fileContentsRetriever);
    }

    private function buildPhpArrayableFile(string $path) : PhpArrayFile
    {
        return new PhpArrayFile($path);
    }

    private function buildJsonArrayableFile(string $path) : JsonFile
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new JsonFile($path, $fileContentsRetriever);
    }

    private function buildYamlArrayableFile(string $path) : YamlFile
    {
        $fileContentsRetriever = new FileContentsRetriever();
        $yamlParser = new YamlParser();
        return new YamlFile($path, $fileContentsRetriever, $yamlParser);
    }
}
