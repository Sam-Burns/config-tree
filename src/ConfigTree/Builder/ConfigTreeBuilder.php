<?php
namespace ConfigTree\Builder;

use ConfigTree\Tree\ConfigTree;
use ConfigTree\FileParsing\ArrayableFileFactory;
use ConfigTree\Exception\FileFormatNotParsable;
use ConfigTree\Exception\FileNotReadable;

class ConfigTreeBuilder
{
    /** @var ArrayableFileFactory */
    private $arrayableFileFactory;

    /** @var ConfigTree */
    private $configTreeToReturn;

    public function __construct(ArrayableFileFactory $arrayableFileFactory = null)
    {
        $this->arrayableFileFactory = $arrayableFileFactory ?: new ArrayableFileFactory();
        $this->configTreeToReturn = new ConfigTree([]);
    }

    /**
     * @throws FileFormatNotParsable
     * @throws FileNotReadable
     *
     * @param string[] $pathsToFiles
     */
    public function addSettingsFromPaths(array $pathsToFiles)
    {
        foreach ($pathsToFiles as $pathToFile) {
            $this->addSettingsFromPath($pathToFile);
        }
    }

    /**
     * @throws FileFormatNotParsable
     * @throws FileNotReadable
     */
    private function addSettingsFromPath(string $pathToFile)
    {
        $arrayableFile = $this->arrayableFileFactory->getArrayableFileFromPath($pathToFile);
        $fileContentsAsArray = $arrayableFile->toArray();
        $config = new ConfigTree($fileContentsAsArray);
        $this->configTreeToReturn = $this->configTreeToReturn->withAnotherConfigTreeMergedIn($config);
    }

    public function buildConfigTreeAndReset() : ConfigTree
    {
        $configToReturn = $this->configTreeToReturn;
        $this->configTreeToReturn = new ConfigTree([]);
        return $configToReturn;
    }
}
