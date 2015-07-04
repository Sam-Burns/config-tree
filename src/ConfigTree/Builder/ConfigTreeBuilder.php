<?php
namespace ConfigTree\Builder;

use ConfigTree\Tree\ConfigTree;
use ConfigTree\FileParsing\ArrayableFileFactory;

class ConfigTreeBuilder
{
    /** @var ArrayableFileFactory */
    private $arrayableFileFactory;

    /**
     * @param ArrayableFileFactory|null $arrayableFileFactory
     */
    public function __construct(ArrayableFileFactory $arrayableFileFactory = null)
    {
        $this->arrayableFileFactory = $arrayableFileFactory ?: new ArrayableFileFactory();
    }

    /**
     * @param string $pathToFile
     */
    public function addSettingsFromPath($pathToFile)
    {

    }

    /**
     * @return ConfigTree
     */
    public function buildConfigTreeAndReset()
    {

    }
}
