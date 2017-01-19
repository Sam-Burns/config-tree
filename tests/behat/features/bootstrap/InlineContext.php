<?php

use Behat\Behat\Context\Context;
use ConfigTree\Tree\ConfigTree;
use ConfigTree\Builder\ConfigTreeBuilder;

class InlineContext implements Context
{
    /** @var ConfigTreeBuilder */
    private $configTreeBuilder;

    /** @var ConfigTree */
    private $configTree;

    /**
     * @Given I have a Config Tree Builder
     */
    public function iHaveAConfigTreeBuilder()
    {
        $this->configTreeBuilder = new ConfigTreeBuilder();
    }

    /**
     * @Given I have told the Config Tree Builder to read the config file :pathToConfigFile
     */
    public function iHaveToldTheConfigTreeBuilderToReadTheConfigFile($pathToConfigFile)
    {
        $this->configTreeBuilder->addSettingsFromPaths([__DIR__ . '/../../../fixtures/merging/' . $pathToConfigFile]);
    }

    /**
     * @When I get a Config Tree object from the Config Tree Builder
     */
    public function iGetAConfigTreeObjectFromTheConfigTreeBuilder()
    {
        $this->configTree = $this->configTreeBuilder->buildConfigTreeAndReset();
    }

    /**
     * @Then I should get a Config Tree object which has been merged correctly
     */
    public function iShouldGetAConfigTreeObjectWhichHasBeenMergedCorrectly()
    {
        $expectedResult = [
            'parameters' => [
                'node1' => [
                    'node2' => [
                        'node3' => 'value3.2',
                        'node4' => 'value4.1',
                    ]
                ]
            ]
        ];

        PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $this->configTree->toArray()
        );
    }
}
