---
layout: page
title: Free and Pro Versions
permalink: /docs/free-pro-versions
nav_order: 4
has_children: true
---

# Free and Pro Versions
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Different versions
We use the Free and Pro model where users need only one package for using the specific plugin.

### Free

Our free plugins are available in the [WordPress plugin directory](https://wordpress.org).

Those plugins are fully functional and are not broken versions designed to sell the Pro upgrade.

#### Assets loading

When a Free plugin is used as dependency to the Pro plugin the assets can't be loaded based on URLs
from the Free plugin using the `plugins_url` function because the Free plugin works as a plugin,
but is not recognized by WordPress functions as one.

This requires that the vendor folder is in a path that can be accessed by public the internet.

So, for Free plugins we should use the following code to get the correct plugin's URL:

```php
define('MY_PLUGIN_BASE_PATH', __DIR__);

//...

if (defined('PUBLISHPRESS_CUSTOM_VENDOR_PATH') && defined('PUBLISHPRESS_CUSTOM_VENDOR_URL')) {
        $relativePath = str_replace(PUBLISHPRESS_CUSTOM_VENDOR_PATH, '', $relativePath);
        define('PUBLISHPRESS_URL', PUBLISHPRESS_CUSTOM_VENDOR_URL . $relativePath . '/');
    } else {
        define('PUBLISHPRESS_URL', plugins_url('/', 'publishpress/publishpress.php'));
    }
```

Then we need to instruct the clients to specify the vendor path and url constants in their `wp-config.php` file:

```php
define('PUBLISHPRESS_CUSTOM_VENDOR_URL', 'https://dev.local/wp-content/vendor/');
define('PUBLISHPRESS_CUSTOM_VENDOR_PATH', '/Users/me/Local Sites/dev/app/public/wp-content/vendor/');
```

### Pro

The Pro plugins are available to PublishPress members and can be downloaded from [PublishPress.com](https://publishpress.com).

Pro plugins are a complement for the Free plugins, with additional features.
We add the Free plugin inside the Pro package and use it as the base for the Pro version.
It can be found in the [Composer's vendor dir]({% link docs/development/dependency-management.md %}).
