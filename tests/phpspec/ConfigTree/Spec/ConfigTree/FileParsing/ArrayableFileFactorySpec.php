<?php
namespace ConfigTree\Spec\ConfigTree\FileParsing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayableFileFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('ConfigTree\FileParsing\ArrayableFileFactory');
    }

    function it_can_build_php_array_file_readers()
    {
        $this->getArrayableFileFromPath('config.php')->shouldHaveType('\ConfigTree\FileParsing\Formats\PhpArrayFile');
    }

    function it_can_build_json_file_readers()
    {
        $this->getArrayableFileFromPath('config.json')->shouldHaveType('\ConfigTree\FileParsing\Formats\JsonFile');
    }

    function it_can_build_ini_file_readers()
    {
        $this->getArrayableFileFromPath('config.ini')->shouldHaveType('\ConfigTree\FileParsing\Formats\IniFile');
    }

    function it_can_build_yml_file_readers()
    {
        $this->getArrayableFileFromPath('config.yml')->shouldHaveType('\ConfigTree\FileParsing\Formats\YamlFile');
        $this->getArrayableFileFromPath('config.yaml')->shouldHaveType('\ConfigTree\FileParsing\Formats\YamlFile');
    }

    function it_can_throw_an_exception_if_the_format_isnt_parsable()
    {
        $this
            ->shouldThrow('\ConfigTree\Exception\FileFormatNotParsable')
            ->during('getArrayableFileFromPath', ['config.somethingelse'])
        ;
    }
}
