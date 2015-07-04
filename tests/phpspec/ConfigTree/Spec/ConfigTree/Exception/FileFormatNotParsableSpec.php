<?php

namespace ConfigTree\Spec\ConfigTree\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileFormatNotParsableSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('constructWithFilePath', array('unparsablefile.something'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\ConfigTree\Exception\FileFormatNotParsable');
    }

    function it_has_a_meaningful_message()
    {
        $this->getMessage()->shouldBe('Config file "unparsablefile.something" is not of a format that can be parsed. Try .ini, .php, .json, or .yml.');
    }
}
