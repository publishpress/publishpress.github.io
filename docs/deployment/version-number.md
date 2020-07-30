---
layout: page
title: Version Number
permalink: /docs/deployment/version-number
nav_order: 1
parent: Deployment
---

# Version Number
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Version number specification

Our plugins follow the [Semantic Versioning](https://semver.org/) specification.

## Checking the current version number

If you have the [builder installer]({% link docs/deployment/building.md %}) you can use the command `version` with no argument:

```bash
$ vendor/bin/robo version
```

The version number will be displayed in the screen.

## Updating the version number

If you have the [builder installer]({% link docs/deployment/building.md %}) you can use the command `version` adding the
version number as the first argument:

```bash
$ vendor/bin/robo version 2.0.3
```

If you are updating to a stable version number the builder will update the version in the following files:

* Plugin's main PHP file, in the file header
* readme.txt file, in the "Stable tag" entry
* In the defines.php file, if exists

If the version is an unstable version number, then the readme.txt file won't be updated.

By default, our [repo structure]({% link docs/development/repository.md %}) expects that you have a `defines.php` file
with a constant for the version. The constant's name should unique for each project, so you can specify for the builder
what is the expected name customizing your `RoboFile.php` file:

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

        $this->setVersionConstantName('PUBLISHPRESS_DUMMY_VERSION');
    }
}
```  
