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
     *
     * @param string $pathToFile
     * @return ArrayableFile
     */
    public function getArrayableFileFromPath($pathToFile)
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

    /**
     * @param string $path
     * @return IniFile
     */
    private function buildIniArrayableFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new IniFile($path, $fileContentsRetriever);
    }

    /**
     * @param string $path
     * @return PhpArrayFile
     */
    private function buildPhpArrayableFile($path)
    {
        return new PhpArrayFile($path);
    }

    /**
     * @param string $path
     * @return JsonFile
     */
    private function buildJsonArrayableFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        return new JsonFile($path, $fileContentsRetriever);
    }

    /**
     * @param string $path
     * @return YamlFile
     */
    private function buildYamlArrayableFile($path)
    {
        $fileContentsRetriever = new FileContentsRetriever();
        $yamlParser = new YamlParser();
        return new YamlFile($path, $fileContentsRetriever, $yamlParser);
    }
}
