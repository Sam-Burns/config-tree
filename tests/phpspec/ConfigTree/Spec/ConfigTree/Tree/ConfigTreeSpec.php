<?php
namespace ConfigTree\Spec\ConfigTree\Tree;

use ConfigTree\Tree\ConfigTree;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigTreeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            [
                'node1' => [
                    'node2' => 'value',
                    'node3' => 'value'
                ]
            ]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('ConfigTree\Tree\ConfigTree');
    }

    function it_can_become_an_array()
    {
        $this->toArray()->shouldBe(
            [
                'node1' => [
                    'node2' => 'value',
                    'node3' => 'value'
                ]
            ]
        );
    }

    function it_can_retrieve_values()
    {
        $this->getSettingFromPath('node1/node2')->shouldBe('value');
    }

//    function it_can_throw_an_exception_if_config_option_not_set()
//    {
//        $this
//            ->shouldThrow('\ConfigTree\Exception\ConfigTreeParamNotSet')
//            ->during('getSettingFromPath', ['setting/not/set/in/file'])
//        ;
//    }
//
//    function it_can_retrieve_subtrees()
//    {
//        $this->getSettingFromPath('node1')->shouldBeLike(new ConfigTree(['node2' => 'value']));
//    }
//
//    function it_can_do_merging(ConfigTree $anotherConfigTree)
//    {
//        $otherConfigAsArray = [
//            'node1' => [
//                'node2' => 'value-that-should-override-other',
//                'node4' => 'value-that-should-be-added'
//            ]
//        ];
//
//        $expectedMergeResult = [
//            'node1' => [
//                'node2' => 'value-that-should-override-other',
//                'node3' => 'value',
//                'node4' => 'value-that-should-be-added'
//            ]
//        ];
//
//        $anotherConfigTree->toArray()->willReturn($otherConfigAsArray);
//
//        $this->withAnotherConfigTreeMergedIn($anotherConfigTree)->shouldBeLike(new ConfigTree($expectedMergeResult));
//    }
}
