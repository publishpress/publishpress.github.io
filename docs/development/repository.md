---
layout: page
title: Repository Organization
permalink: /docs/development/repository
nav_order: 2
parent: Development
---

# Repository Organization
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Main plugin file

### File name

By default, the name of the main file should be the plugin slug. If your plugin needs to use a different filename for
backward compatibility, make sure to specify the correct filename in the `RoboFile.php` file, for the builder.

Please, check the [builder docs]({% link docs/deployment/building.md %}).

### File Header

Please, make sure the file header matches the following standard:

```php
<?php
/**
 * Plugin Name: <plugin-name-human-readable>
 * Plugin URI: https://publishpress.com/<plugin-slug>/
 * Description: <plugin-description>
 * Version: <plugin-version>
 * Author: PublishPress
 * Author URI: https://publishpress.com/
 * Text Domain: <plugin-slug>
 * Domain Path: /languages
 * Min WP Version: <min-wp-version>
 * Requires PHP: 5.6.20
 * License: GPLv3
 *
 * Copyright (c) <current-year> PublishPress
 *
 *
 * @package 	<plugin-slug>
 * @author		PublishPress
 * @copyright   Copyright (c) <current-year> PublishPress
 * @license		GNU General Public License version 3
 * @link		https://publishpress.com/
 */
```

If your plugin is a fork of another one, please make sure to mention the original credits and copyright as below:

```php
<?php
/**
 * Plugin Name: <plugin-name-human-readable>
 * Plugin URI: https://publishpress.com/<plugin-slug>/
 * Description: <plugin-description>
 * Version: <plugin-version>
 * Author: PublishPress
 * Author URI: https://publishpress.com/
 * Text Domain: <plugin-slug>
 * Domain Path: /languages
 * Min WP Version: <min-wp-version>
 * Requires PHP: 5.6.20
 * License: GPLv3
 *
 * Copyright (c) <current-year> PublishPress
 *
 * ------------------------------------------------------------------------------
 * Based on <the-original-plugin-name>
 * Author: <the-original-author>
 * Copyright (c) <initial-copyright-year>-<final-copyright-year> <original-author-name>
 * ------------------------------------------------------------------------------
 *
 * @package 	<plugin-slug>
 * @author		PublishPress
 * @copyright   Copyright (c) <initial-copyright-year>-<final-copyright-year> <original-author-name>, modifications Copyright (c) <current-year> PublishPress
 * @license		GNU General Public License version 3
 * @link		https://publishpress.com/
 */
```

## Default directory structure

### README.md

Github uses this file to display a readme text in the repository. It is very important to have at least the following sections:
If needed, update the URL for the contributor guidelines file.

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/README.md)

### RoboFile.php

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/RoboFile.php)

### readme.txt

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/readme.txt)

### .github/

#### .github/CONTRIBUTING.md

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/CONTRIBUTING.md)

#### .github/ISSUE_TEMPLATE/release-free-plugin.md

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/release-free-plugin.md.dist)

#### .github/ISSUE_TEMPLATE/release-pro-plugin.md

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/release-pro-plugin.md.dist)

### composer.json

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/composer.json)

### .gitignore

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/.gitignore)

### .gitattributes

File used by git to specify attributes to pathnames.

One of the main reason to add this file into the repository is to make sure the files listed there with the attribute `export-ignore` won't be added to the archives.

How archives are created?

* By running `git archive` command.
* By clicking on GitHub's Code > Download ZIP button.
* By clicking on Github's Releases > Assets > Souce code.
* By requiring the package using composer, if correctly [configured for using "preferred-install": "dist"]({% link docs/development/preparing-composer.md %}).

This file is extremely important to reduce the size of archive files and to avoid that test files, scripts or other files that should not be added to production are released into final packages or inside the **composer's vendor** directory.

Here is an example of the "WordPress Reviews" library v1.1.18 imported by composer without using the `.gitattributes` file:

![Library without using gitattributes](/assets/img/library-without-gitattributes.png "Library without using gitattributes")

Note that files like `.gitignore`, `phpcs.xml.dist`, and others files that are intendended for development only, are included into the production packages.

Now, take a look when we require that library from v1.1.19, introducing the `.gitattributes` file:

![Library using gitattributes](/assets/img/library-with-gitattributes.png "Library using gitattributes")

Note that we don't have those files anymore.

[Documentation of gitattributes file](https://git-scm.com/docs/gitattributes)

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/.gitattributes)

### .distignore

This file is not require, but is useful when using the command `wp dist-archive` command to create the final distribution archive for WordPress plugins. We don't use this method right now, but we are keeping it here to document it and check future opportunity to use it.

[Documentation for the dist-archive command]()

[Click here for an example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/.distignore)
