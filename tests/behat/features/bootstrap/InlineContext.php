<?php

use Behat\Behat\Tester\Exception\PendingException;
use \Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\Context;
use ConfigTree\Tree\ConfigTree;
use ConfigTree\Builder\ConfigTreeBuilder;

class InlineContext implements Context, SnippetAcceptingContext
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
        $this->configTreeBuilder->addSettingsFromPath(__DIR__ . '/../../../fixtures/' . $pathToConfigFile);
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
        $expectedResult = array(
            'parameters' => array(
                'node1' => array(
                    'node2' => array(
                        'node3' => 'value3.2',
                        'node4' => 'value4.1',
                    )
                )
            )
        );

        PHPUnit_Framework_Assert::assertEquals(
            $expectedResult,
            $this->configTree->toArray()
        );
    }
}
