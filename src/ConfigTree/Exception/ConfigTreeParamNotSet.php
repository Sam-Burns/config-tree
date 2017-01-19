<?php
namespace ConfigTree\Exception;

class ConfigTreeParamNotSet extends \RuntimeException
{
    public static function constructWithSettingPath(string $pathToConfigSettingInTree) : ConfigTreeParamNotSet
    {
        $message = 'Config setting "' . $pathToConfigSettingInTree . '" not set.';
        return new static($message);
    }
}
