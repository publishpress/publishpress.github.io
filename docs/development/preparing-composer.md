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
  "config": {
    "preferred-install": "dist"
  },
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

#### Property: preffered-install = dist

This property tells composer to download requirement using dist files. This is important to make sure that files like tests, development env config files, and others are not downloaded into the vendor folder.

Files listed as `export-ignore` on the `.gitattributes` files found into the GitHub repositories won't be added to the vendor folder, consequently, to the final built packages. [Read more about .gitattributes file]({% link docs/development/repository.md %}).

#### Assets loading

Please, see the instructions here: [Free plugin in the Pro plugin]({% link docs/free-pro/index.md %})

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
    "vendor-dir": "wp-content/vendor",
    "preferred-install": "dist"
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
  },
  "config": {
    "preferred-install": "dist"
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

The Free plugin (as a library - see [Free plugin in the Pro plugin]({% link docs/free-pro/index.md %})) and the Installers, that pack scripts to handle the
plugin installation on sites using Composer.

### Example of the client configuration

#### composer.json
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
#### wp-config.php

The client need to define the following constants so the Free plugin is able to get
assets from the correct path and URL. This is required because they can set custom
paths for the vendor dir, and we can't find out automatically for now.

```php
define('PUBLISHPRESS_CUSTOM_VENDOR_URL', 'https://dev.local/wp-content/vendor/');
define('PUBLISHPRESS_CUSTOM_VENDOR_PATH', '/Users/me/Local Sites/dev/app/public/wp-content/vendor/');
```

#### SSH access to our private repos

If the client have an active plan he can [e-mail us](mailto:help@publishpress.com)" sending his public SSH key and asking for being included in the repository.

We need to add his SSH key as a deployment key on the specific repository. Please, don't give complete access to the repository.

In case he need more info about how to generate SSH keys you can send him this documentation: [Generating a new SSH key and adding it to the ssh-agent](https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent).

Those keys need to be generated, or installed, in the server he wants to install our plugins using Composer.
