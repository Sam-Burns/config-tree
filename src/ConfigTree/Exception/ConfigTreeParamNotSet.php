<?php
namespace ConfigTree\Exception;

class ConfigTreeParamNotSet extends \RuntimeException
{
    /**
     * @param string $pathToConfigSettingInTree
     * @return ConfigTreeParamNotSet
     */
    public static function constructWithSettingPath($pathToConfigSettingInTree)
    {
        $message = 'Config setting "' . $pathToConfigSettingInTree . '" not set.';
        return new static($message);
    }
}
