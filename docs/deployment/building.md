---
layout: page
title: Building a Package
permalink: /docs/deployment/building
nav_order: 2
parent: Deployment
---

# Building a Package
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Requirements

* Composer - More details on the [Dependency Management documentation]({% link docs/development/dependency-management.md %}).
* PHP 7.3+ - Our plugins still support PHP 5.6, but the build scripts and other development tools require PHP 7.

Composer will manage all the other dependencies, including the build tool. We consider you have it properly installed.

## How to build a package

We use a set of custom tasks that run on [Robo](https://robo.li/), a task runner for PHP.
The project's repository is [publishpress/PublishPress-Plugin-Builder](https://github.com/publishpress/PublishPress-Plugin-Builder/).


### Installing the builder

You can install the builder scripts running the following command:

```bash
$ composer require --dev publishpress/publishpress-plugin-builder
```

Create a new file in the project's root dir: `RoboFile.php`:

```php
<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \PublishPressBuilder\PackageBuilderTasks
{
}
```

### Removing files from the built package

The builder automatically removes some files from the built package to keep it clean. Tests, configuration files for the development tools, .git folder, and others, are not added to the zip file.
You can check the full [list of files that will be removed](https://github.com/publishpress/PublishPress-Plugin-Builder/blob/master/files-to-ignore.txt). 

For adding more files to that list, feel free to submit a Pull Request updating that file or customizing your Robo script using the method `appendToFileToIgnore`:

```php
<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \PublishPressBuilder\PackageBuilderTasks
{
    public function __construct()
    {
        parent::__construct();
        
        // This is optional, but you can use for adding more files to be ignored in the built package.
        $this->appendToFileToIgnore(
            [
                'webpack.config.js',
                'legacy-tests',
                'src/assets/lib/chosen-v1.8.3/docsupport',
                'src/assets/lib/chosen-v1.8.3/bower.json',
                'src/assets/lib/chosen-v1.8.3/create-example.jquery.html',
                'src/assets/lib/chosen-v1.8.3/create-example.proto.html',
                'src/assets/lib/chosen-v1.8.3/index.proto.html',
                'src/assets/lib/chosen-v1.8.3/options.html',
                'src/assets/lib/chosen-v1.8.3/package.json',
            ]
        );
    }
}
```

### Plugins with a custom file name

If the main file of the plugin is not equals to the plugin slug then you need to make sure you set the correct filename
in the builder script, replacing `theCustomFileName` in the following snippet:

```php
class RoboFile extends \PublishPressBuilder\PackageBuilderTasks
{
    public function __construct()
    {
        $this->setPluginFileName('theCustomFileName.php');
        
        parent::__construct();
    }
}
```

### Version

Make sure to always use the `version` command to set the version in the plugin before building it. Do not change the version manually. 
Please [read the docs]({% link docs/deployment/version-number.md %}) for the command.

### Destination directory

The builder will create a `./dist` folder inside the project's root dir and use it as a temporary folder for the files and final .zip file. 

If you want, you can choose a different location for the final package, so you can have a common folder where you store all the built packages. A Dropbox folder will be very handy to get a shareable link for those packages, in case you need to send them to a client for testing.

For setting a custom destination dir, you can create a YAML file `builder.yml` in the project's root dir:

```yaml
destination: "/Users/developer/Dropbox/Tmp-Packages/"
```

## Creating a zip file

For creating a .zip package you just need to run the following command:

```bash
$ vendor/bin/robo build
```

## Building to a folder instead of to a zip file

Sometimes you want to build the final code to a directory instead of to a zip file. If that is the case you can run the following command:

```bash
$ vendor/bin/robo build:unpacked
``` 

## Composer scripts

For convenience, you can add the build commands to composer as a script. That makes the command shorter and easier to run.

Edit your `composer.json` file:
```json
{
    "scripts": {
        "build": "vendor/bin/robo build --ansi",
        "build-unpacked": "vendor/bin/robo build:unpacked --ansi"
    }
}
```

Then you can just run:

```bash
$ composer build
$ composer build-unpacked
```

