<?php

namespace ConfigTree\Spec\ConfigTree\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigTreeParamNotSetSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('constructWithSettingPath', array('config/option/that/wasnt/set'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\ConfigTree\Exception\ConfigTreeParamNotSet');
    }

    function it_has_a_meaningful_message()
    {
        $this->getMessage()->shouldBe('Config setting "config/option/that/wasnt/set" not set.');
    }
}
