<?php

namespace ConfigTree\Spec\ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\Reading\FileContentsRetriever;
use Symfony\Component\Yaml\Parser as YamlParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YamlFileSpec extends ObjectBehavior
{
    function let(FileContentsRetriever $fileContentsRetriever, YamlParser $yamlParser)
    {
        $this->beConstructedWith('file-path.yaml', $fileContentsRetriever, $yamlParser);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\ConfigTree\FileParsing\Formats\YamlFile');
        $this->shouldHaveType('\ConfigTree\FileParsing\ArrayableFile');
    }

    function it_can_be_converted_to_an_array(FileContentsRetriever $fileContentsRetriever, YamlParser $yamlParser)
    {
        $fileContents = "node1:\n    node2: value";
        $fileContentsRetriever->fileGetContents('file-path.yaml')->willReturn($fileContents);
        $yamlParser->parse($fileContents)->willReturn(['node1' => ['node2' => 'value']]);

        $this->toArray()->shouldReturn(['node1' => ['node2' => 'value']]);
    }
}
