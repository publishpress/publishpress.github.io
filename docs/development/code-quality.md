---
layout: page
title: Code Quality
permalink: /docs/development/code-quality
parent: Development
nav_order: 6
---

# Code Quality
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Code style

We use the [PSR-12 standard](https://www.php-fig.org/psr/psr-12/).

Most IDEs or code editors support automatic check for the code style run.

### Installing PHPCS

You can install it as a composer dev requirement:

```bash
$ composer require --dev squizlabs/php_codesniffer
```

### Checking the code style

For checking the code style we use [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

You can check the code style running: 

```bash
$ vendor/bin/phpcs --standard=PSR12 ./src-dir any-other-file.php --colors
```

### Composer script

For convenience, add a composer script to your `composer.json` file:

```json
"scripts": {
    "cs-check": "vendor/bin/phpcs --standard=PSR12 ./src-dir any-other-file.php --colors",
}
```

Then you can just run:

```bash
$ composer cs-check
```

## PHPCS for WordPress VIP

In order to avoid warnings and reports from WordPress VIP sites we should make sure we fixed all the Warnings with
security level over 10.

### Installing the ruleset
 
```bash
$ composer require --dev automattic/vipwpcs dealerdirect/phpcodesniffer-composer-installer
```

### Checking the code

```bash
$ vendor/bin/phpcs --standard=WordPressVIPMinimum ./src
$ vendor/bin/phpcs --standard=WordPress-VIP-Go ./src
$ vendor/bin/phpcs --standard=VariableAnalysis ./src
```

Don't run this command in the `vendor` folder. Maybe it makes sense to create a `.phpcs.xml.dist` file adding the 
speciifc files that should be tested. 

## Mess detector

We use the [PHP Mess Detector](https://phpmd.org/) as a tool for helping to find potential problems withing the source like:

* Possible bugs
* Suboptimal code
* Overcomplicated expressions
* Unused parameters, methods, properties

### Installing PHPMD

You can install as a composer dev requirement
 
```bash
$ composer require --dev phpmd/phpmd
```

Create a file `phpmd-ruleset.xml` in the project's root dir:

```xml
<?xml version="1.0"?>
<ruleset name="PublishPress Plugin"
         xmlns="http://pmd.sf.net/ruleset/1.0.0"
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://pmd.sf.net/ruleset/1.0.0
                       http://pmd.sf.net/ruleset_xml_schema.xsd"
         xsi:noNamespaceSchemaLocation="
                       http://pmd.sf.net/ruleset_xml_schema.xsd">
    <description>Custom ruleset for the PublishPress plugin code</description>

    <rule ref="rulesets/codesize.xml"/>
    <rule ref="rulesets/cleancode.xml"/>
    <rule ref="rulesets/controversial.xml"/>
    <rule ref="rulesets/design.xml"/>
    <rule ref="rulesets/naming.xml"/>
    <rule ref="rulesets/unusedcode.xml"/>
</ruleset>
```

### Checking the code

You can use the tool running:

```bash
$ vendor/bin/phpmd ./src ansi phpmd-ruleset.xml
```

### Composer script

For convenience, you can create a composer script:

```json
"scripts": {
    "mess-check": "vendor/bin/phpmd ./src ansi phpmd-ruleset.xml"
}
```

For checking all the source folder you just need to run:

```bash
$ composer mess-check
```

## DRY - Don't repeat yourself

The DRY principle aim to reduce code duplication. Duplicated code can lead to a poor refactoring and poor maintenance.

In order to detect copied, or repeated code, we use [PHP Copy/Paste Detector (PHPCPD)](https://github.com/sebastianbergmann/phpcpd).

### Installing PHPCPD

You can install as a composer dev requirement
 
```bash
$ composer require --dev sebastian/phpcpd
```

### Checking the code

You can use the tool running:

```bash
$ vendor/bin/phpcpd ./src
```

### Composer script

For convenience, you can create a composer script:

```json
"scripts": {
    "copy-check": "vendor/bin/phpcpd ./src"
}
```

For checking all the source folder you just need to run:

```bash
$ composer copy-check
```
