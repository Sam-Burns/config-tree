<?php
namespace ConfigTree\Tree;

use ConfigTree\Exception\ConfigTreeParamNotSet;

class ConfigTree
{
    /** @var array */
    private $rawConfigArray;

    public function __construct(array $configArray)
    {
        $this->rawConfigArray = $configArray;
    }

    public function toArray() : array
    {
        return $this->rawConfigArray;
    }

    /**
     * @throws ConfigTreeParamNotSet
     *
     * @return mixed
     */
    public function getSettingFromPath(string $pathToConfigSettingInTree)
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
     */
    public function withAnotherConfigTreeMergedIn(ConfigTree $anotherConfigTree) : ConfigTree
    {
        $thisAsArray = $this->rawConfigArray;
        $otherAsArray = $anotherConfigTree->toArray();
        return new ConfigTree(array_replace_recursive($thisAsArray, $otherAsArray));
    }

    /**
     * @throws ConfigTreeParamNotSet
     */
    public function getSubtreeFromPath(string $pathToSubtree) : ConfigTree
    {
        $settingsAsArray = $this->getSettingFromPath($pathToSubtree);
        if (!is_array($settingsAsArray)) {
            throw ConfigTreeParamNotSet::constructWithSettingPath($pathToSubtree);
        }
        return new ConfigTree($settingsAsArray);
    }
}
