<?php
namespace ConfigTree\Spec\ConfigTree\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileNotReadableSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('constructWithPath', array('unreadable_file_path.json'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ConfigTree\Exception\FileNotReadable');
    }

    function it_has_a_meaningful_message()
    {
        $this->getMessage()->shouldBe('Config file "unreadable_file_path.json" could not be read');
    }
}
