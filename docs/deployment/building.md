---
layout: page
title: Building
permalink: /docs/deployment/building
nav_order: 1
parent: Deployment
---

# Building
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## The builder

We use a set of custom tasks that run on [Robo](https://robo.li/), a task runner for PHP.
The project is stored on Github as [publishpress/PublishPress-Plugin-Builder](https://github.com/publishpress/PublishPress-Plugin-Builder/).


### Installing using Composer

For installing we do recommend using Composer for managing the different dependencies. Just make sure to add the library as a dev requirement.

```
$ composer require --dev publishpress/publishpress-plugin-builder
```

Create a new file in the project's root dir: `RoboFile.php`:

```
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

### Ignored files

By default, the builder will ignore a big list of files specified on a .txt file in the builder code. You can [see that file here](https://github.com/publishpress/PublishPress-Plugin-Builder/blob/master/files-to-ignore.txt).

Actually it remove those files from the built package if they exist.

You can specify your own list of files using the method `appendToFileToIgnore` like the example of Robo file above.

### Destination directory

The builder will create a `./dist` dir inside the project's root dir and use it as a temporary folder for the files and final .zip file. 

If you want, you can choose a different location for the final package so you can have a common folder where you store all the built packages. A Dropbox folder will make very easy to share a link for those packages, in case you need to send them to a client for testing.

For setting a custom destination dir, you can create a YAML file in the project's root dir, named as `builder.yml`:

```
destination: "/Users/developer/Dropbox/Tmp-Packages/"
```

## Building a .zip package

For building a .zip package you can run the command:

```
$ vendor/bin/robo build
```

## Building to a folder (no .zip file)

Sometimes you want to build the final code to a directory instead of to a .zip file. If that is the case you can run the following command:

```
$ vendor/bin/robo build:unpacked
``` 

## Composer scripts

For convenience, you can add the build commands to composer as a script. That makes the command shorter and easier to run.

Edit your `composer.json` file:
```
"scripts": {
    "build": "vendor/bin/robo build --ansi",
    "build-unpacked": "vendor/bin/robo build:unpacked --ansi"
}
```

Then you can just run:

```
$ composer build
$ composer build-unpacked
```

