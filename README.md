[![Build Status](https://travis-ci.org/Sam-Burns/config-tree.svg?branch=master)](https://travis-ci.org/Sam-Burns/config-tree)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Sam-Burns/config-tree/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Sam-Burns/config-tree/?branch=master)

Config Tree
===========

Description
-----------

A library for reading config files of various formats, and representing them as config tree objects.

Example of usage
----------------

```config.json``` file:
```json
{
    "parameters": {
        "mysql": {
            "user": "dbuser"
        }
    }
}
```

```php
$configBuilder = new \ConfigTree\Builder\ConfigTreeBuilder();
$configBuilder->addSettingsFromPath('/path/config.json');
$config = $configBuilder->buildConfigTreeAndReset();

$mysqlUsername = $config->getSettingFromPath('parameters/mysql/user');
// $mysqlUsername === "dbuser"
```
