<?php
namespace ConfigTree\Tree;

use ConfigTree\Exception\ConfigTreeParamNotSet;
use ConfigTree\Exception\FileNotReadable;
use ConfigTree\Exception\FileFormatNotParsable;

class ConfigTree
{
    /**
     * @param array $configArray
     */
    public function __construct($configArray)
    {

    }

    /**
     * @throws FileNotReadable
     * @throws FileFormatNotParsable
     *
     * @param string $pathToFile
     * @return ConfigTree
     */
    public static function constructFromFile($pathToFile)
    {

    }

    /**
     * @return array
     */
    public function toArray()
    {

    }

    /**
     * @throws ConfigTreeParamNotSet
     *
     * @param string $pathToConfigSettingInTree
     * @return mixed
     */
    public function getSettingFromPath($pathToConfigSettingInTree)
    {

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
