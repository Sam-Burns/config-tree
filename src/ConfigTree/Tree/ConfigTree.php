<?php
namespace ConfigTree\Tree;

use ConfigTree\Exception\ConfigTreeParamNotSet;
use ConfigTree\Exception\FileNotReadable;
use ConfigTree\Exception\FileFormatNotParsable;
use ConfigTree\FileParsing\ArrayableFileFactory;

class ConfigTree
{
    /** @var array */
    private $configArray;

    /**
     * @param array $configArray
     */
    public function __construct($configArray)
    {
        $this->configArray = $configArray;
    }

    /**
     * @throws FileNotReadable
     * @throws FileFormatNotParsable
     *
     * @param string               $pathToFile
     * @param ArrayableFileFactory $arrayableFileFactory
     * @return ConfigTree
     */
    public static function constructFromFile($pathToFile, ArrayableFileFactory $arrayableFileFactory = null)
    {

    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->configArray;
    }

    /**
     * @throws ConfigTreeParamNotSet
     *
     * @param string $pathToConfigSettingInTree
     * @return mixed
     */
    public function getSettingFromPath($pathToConfigSettingInTree)
    {
        $nodesInPathThroughTree = explode('/', $pathToConfigSettingInTree);

        $configArray = $this->configArray;

        foreach ($nodesInPathThroughTree as $nodeInTree) {
            if (!isset($configArray[$nodeInTree])) {
                throw ConfigTreeParamNotSet::constructWithSettingPath($pathToConfigSettingInTree);
            }
            $configArray = $configArray[$nodeInTree];
        }
        return $configArray;
    }

    /**
     * In $configC = $configA->withAnotherConfigTreeMergedIn($configB), duplicate settings in $configB override $configA
     *
     * @param ConfigTree $anotherConfigTree
     * @return ConfigTree
     */
    public function withAnotherConfigTreeMergedIn(ConfigTree $anotherConfigTree)
    {

    }
}
