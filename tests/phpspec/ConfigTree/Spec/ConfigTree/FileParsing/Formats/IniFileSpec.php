<?php
namespace ConfigTree\Spec\ConfigTree\FileParsing\Formats;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ConfigTree\FileParsing\Reading\FileContentsRetriever;

class IniFileSpec extends ObjectBehavior
{
    function let(FileContentsRetriever $fileContentsRetriever)
    {
        $this->beConstructedWith('file-path.ini', $fileContentsRetriever);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\ConfigTree\FileParsing\Formats\IniFile');
        $this->shouldHaveType('\ConfigTree\FileParsing\ArrayableFile');
    }

    function it_can_be_converted_to_an_array(FileContentsRetriever $fileContentsRetriever)
    {
        $fileContents = 'node1[node2] = value';
        $fileContentsRetriever->fileGetContents('file-path.ini')->willReturn($fileContents);

        $this->toArray()->shouldReturn(['node1' => ['node2' => 'value']]);
    }
}
