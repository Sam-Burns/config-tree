Feature: Generating a config object for an application
  In order to use config files in my application
  As a developer with some config files
  I want to use the Config Tree Builder to parse config files and merge them into a Config Tree objects

  Scenario: Building a config object out of several files
    Given I have a Config Tree Builder
    And I have told the Config Tree Builder to read the config file 'config1.php'
    And I have told the Config Tree Builder to read the config file 'config2.json'
    When I get a Config Tree object from the Config Tree Builder
    Then I should get a Config Tree object which has been merged correctly
