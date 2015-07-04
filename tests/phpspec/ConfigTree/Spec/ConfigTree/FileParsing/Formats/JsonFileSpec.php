<?php

namespace ConfigTree\Spec\ConfigTree\FileParsing\Formats;

use ConfigTree\FileParsing\Reading\FileContentsRetriever;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonFileSpec extends ObjectBehavior
{
    function let(FileContentsRetriever $fileContentsRetriever)
    {
        $this->beConstructedWith('file-path.json', $fileContentsRetriever);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\ConfigTree\FileParsing\Formats\JsonFile');
        $this->shouldHaveType('\ConfigTree\FileParsing\ArrayableFile');
    }

    function it_can_be_converted_to_an_array(FileContentsRetriever $fileContentsRetriever)
    {
        $fileContents = '{"node1": {"node2": "value"}}';
        $fileContentsRetriever->fileGetContents('file-path.json')->willReturn($fileContents);

        $this->toArray()->shouldReturn(['node1' => ['node2' => 'value']]);
    }
}
