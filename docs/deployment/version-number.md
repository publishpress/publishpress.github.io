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

Additionally, in order to avoid confusion and to keep consistency among our plugins, the version number we set for
plugins should always have the 3 digits.

Please, note that the [Semantic Versioning](https://semver.org/) specification mentions that the number [MUST](https://datatracker.ietf.org/doc/html/rfc2119#section-1) take the form `X.Y.Z`.

**Invalid** version numbers:

* `3`
* `3.0`
* `3.5`
* `1.32`
* `1.4`

**Valid** version numbers for the given examples:

* `3.0.0`
* `3.0.0`
* `3.5.0`
* `1.32.0`
* `1.4.0`

We are focused on achieving a high consistency level on every layer of our processes.

So, take the version `3.2`. When we read that "short version number" we have two possible interpretations: it can be related to
the exact version `3.2.0`, or it can be related to any patch version, `3.2.x`.

To be consistent, we need to be clear. If your intention is to mention a major or minor version and it doesn't matter
of what patch version it is, you can use the "short version". But if the patch version matters, always mention it, even if it is a `0`.

For **packages and files names, git branch names, git tags or changelogs**, the patch version does matter, so make sure to always use the correct form `X.Y.Z`. 


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
