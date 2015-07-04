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
}
