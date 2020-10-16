---
layout: page
title: Preparing for Composer
permalink: /docs/development/preparing-composer
parent: Development
nav_order: 9
---

# Preparing for Composer
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

Some people use Composer to manage all the WP installation, including plugins and themes. In order to support that our
plugins need to be prepared to that.

## Adapting the Free plugin

### composer.json

Here I'm describing the required changes to the `composer.json` in order to make it
compatible with both installation as standalone plugin or as a dependency of the Pro plugin.

#### Minimum required properties

All the following properties are required in the `composer.json` file:  

```json
{
  "name": "publishpress/my-plugin",
  "type": "library",
  "license": "GPL-2.0+",
  "description": "WordPress plugin to do awesome things!",
  "homepage": "http://publishpress.com/",
  "authors": [
    {
      "name": "PublishPress",
      "email": "help@publishpress.com"
    }
  ],
  "autoload": {
    "files": [
      "defines-free-plugin-path.php"
    ]
  }
}
```

#### Property: type

By default, plugins that aim to support Composer installing, should define a
type `wordpress-plugin`. That makes possible the plugin to install the plugin
outside the `vendor` folder, in the `wp-content/plugins` folder (if the plugin
requires the `composer/installers` package.

Considering we use Composer to manage the dependencies between the Free and Pro plugin,
and that we don't want to force Pro users to have both Free and Pro installed,
having only the Pro installed, the Free plugin should be kept as a library inside the Pro.

```json
{
  "type": "library",
}
```

Users that want to install the Free plugin using Composer should use the repository
http://wpackagist.org instead of our Github repository, since that repository mirror the
WordPress plugin directory bypassing the "wrong" `type` property.

In the Free plugin we don't require the `composer/installers` plugin by purpose.

```json
"wpackagist-plugin/publishpress": "*"
```

#### Property: autoload

In the Pro plugin we need to know where the Free plugin was installed, so we can include
the plugin file and init it. Considering we can't guarantee that users using Composer
will always use the standard folder for storing the plugins we need a way to catch that info.

The way we found for doing that is using a PHP file automatically loaded by Composer, which
defines a constant which is read by the Pro plugin.

You should create a file in the plugin's base path, named `defines-free-plugin-path.php`:

```php
<?php
if (!defined('PUBLISHPRESS_FREE_PLUGIN_PATH')) {
    /*
     * This constant is used by the Pro plugin to know where the Free plugin is installed.
     * This file should be automatically loaded by Composer. We use this file instead of
     * the includes.php file because we want to avoid loading all that file before it is
     * really needed.
     */
    define('PUBLISHPRESS_FREE_PLUGIN_PATH', __DIR__);
}

``` 

And the `autoload` property should be defined as:

```json
{
  "autoload": {
    "files": [
      "defines-free-plugin-path.php"
    ]
  }
}
```

#### Assets loading

Please, see the instructions here: [Free plugin in the Pro plugin]({% link docs/free-pro.md %}) 

### Example of the client configuration

An example of `composer.json` file that uses WPStarter and define the Free plugin as dependency:

```json
{
  "name": "gmazzap/wpstarter-simple-example",
  "description": "Example project for WordPress + Composer + WP Starter",
  "type": "project",
  "repositories": [
    {
      "type": "composer",
      "url": "https://wpackagist.org"
    }
  ],
  "require": {
    "wecodemore/wpstarter": "~2.0",
    "wpackagist-plugin/publishpress": "*"
  },
  "config": {
    "vendor-dir": "wp-content/vendor"
  },
  "scripts": {
    "post-install-cmd": "WCM\\WPStarter\\Setup::run",
    "post-update-cmd": "WCM\\WPStarter\\Setup::run"
  },
  "extra": {
    "wordpress-install-dir": "wp"
  }
}
```

## Adapting the Pro plugin

Here is a basic `composer.json` file for the Pro plugin:

### composer.json

```json
{
  "name": "publishpress/my-plugin-pro",
  "type": "wordpress-plugin",
  "license": "GPL-2.0+",
  "description": "WordPress plugin to do awesome things!",
  "homepage": "http://publishpress.com/",
  "authors": [
    {
      "name": "PublishPress",
      "email": "help@publishpress.com"
    }
  ],
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/publishpress/My-plugin.git"
    }
  ],
  "require": {
    "php": ">=5.6.20",
    "publishpress/publishpress": "*",
    "composer/installers": "~1.0"
  }
}
```

#### Property: type

The Pro plugin should be declared as a plugin:

```json
{
  "type": "wordpress-plugin"
}
````

This allows the `composer/installers` package to install the plugin in the correct folder,
usually `wp-content/plugins`.

#### Property: repositories

In order to get the code of the Free plugin from the right place we define a
specific repository for it, and one for the Pro plugin:

```json
{
  "type": "vcs",
  "url": "https://github.com/publishpress/My-Plugin.git"
},
{
  "type": "vcs",
  "url": "https://github.com/publishpress/My-Plugin-Pro.git"
}
```

#### Property: require

Pro plugins require at least two dependencies:

```json
"publishpress/my-plugin": "*",
"composer/installers": "~1.0"
```

The Free plugin (as a library - see [Free plugin in the Pro plugin]({% link docs/free-pro.md %})) and the Installers, that pack scripts to handle the
plugin installation on sites using Composer. 

### Example of the client configuration

An example of `composer.json` file that uses WPStarter and define the Pro plugin as dependency:

```json
{
  "name": "gmazzap/wpstarter-simple-example",
  "description": "Example project for WordPress + Composer + WP Starter",
  "type": "project",
  "repositories": [
    {
      "type": "composer",
      "url": "https://wpackagist.org"
    },
    {
        "type": "vcs",
        "url": "https://github.com/publishpress/My-Plugin.git"
    },
    {
      "type": "vcs",
      "url": "https://github.com/publishpress/My-Plugin-Pro.git"
    }
  ],
  "require": {
    "wecodemore/wpstarter": "~2.0",
    "publishpress/my-plugin-pro": "*"
  },
  "config": {
    "vendor-dir": "wp-content/vendor"
  },
  "scripts": {
    "post-install-cmd": "WCM\\WPStarter\\Setup::run",
    "post-update-cmd": "WCM\\WPStarter\\Setup::run"
  },
  "extra": {
    "wordpress-install-dir": "wp"
  }
}
```
