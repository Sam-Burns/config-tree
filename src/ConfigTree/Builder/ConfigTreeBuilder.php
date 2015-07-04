<?php
namespace ConfigTree\Builder;

use ConfigTree\Tree\ConfigTree;
use ConfigTree\FileParsing\ArrayableFileFactory;

class ConfigTreeBuilder
{
    /** @var ArrayableFileFactory */
    private $arrayableFileFactory;

    /** @var ConfigTree */
    private $configTreeToReturn;

    /**
     * @param ArrayableFileFactory|null $arrayableFileFactory
     */
    public function __construct(ArrayableFileFactory $arrayableFileFactory = null)
    {
        $this->arrayableFileFactory = $arrayableFileFactory ?: new ArrayableFileFactory();
        $this->configTreeToReturn = new ConfigTree([]);
    }

    /**
     * @param string $pathToFile
     */
    public function addSettingsFromPath($pathToFile)
    {
        $arrayableFile = $this->arrayableFileFactory->getArrayableFileFromPath($pathToFile);
        $fileContentsAsArray = $arrayableFile->toArray();
        $config = new ConfigTree($fileContentsAsArray);
        $this->configTreeToReturn = $this->configTreeToReturn->withAnotherConfigTreeMergedIn($config);
    }

    /**
     * @return ConfigTree
     */
    public function buildConfigTreeAndReset()
    {
        $configToReturn = $this->configTreeToReturn;
        $this->configTreeToReturn = new ConfigTree([]);
        return $configToReturn;
    }
}
