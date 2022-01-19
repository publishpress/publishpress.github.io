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

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/README.md)

### RoboFile.php

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/RoboFile.php)

### readme.txt

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/readme.txt)

### .github/

#### .github/CONTRIBUTING.md

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/CONTRIBUTING.md)

#### .github/ISSUE_TEMPLATE/release-free-plugin.md

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/release-free-plugin.md.dist)

#### .github/ISSUE_TEMPLATE/release-pro-plugin.md

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/release-pro-plugin.md.dist)

### composer.json

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/composer.json)

### .gitignore

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/.gitignore)
