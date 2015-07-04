<?php
namespace ConfigTree\Tree;

use ConfigTree\Exception\ConfigTreeParamNotSet;
use ConfigTree\Exception\FileNotReadable;
use ConfigTree\Exception\FileFormatNotParsable;
use ConfigTree\FileParsing\ArrayableFileFactory;

class ConfigTree
{
    /** @var array */
    private $rawConfigArray;

    /**
     * @param array $configArray
     */
    public function __construct($configArray)
    {
        $this->rawConfigArray = $configArray;
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
        return $this->rawConfigArray;
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

        $configArray = $this->rawConfigArray;

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
        $thisAsArray = $this->rawConfigArray;
        $otherAsArray = $anotherConfigTree->toArray();
        return new ConfigTree(array_replace_recursive($thisAsArray, $otherAsArray));
    }
}
