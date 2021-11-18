---
layout: page
title: Sidebar Banner
permalink: /docs/interface/sidebar-banner
parent: User Interface
nav_order: 4
---

# Sidebar Banner

---
The Sidebar Banner purpose is to display instructions and advertisements.

![Sidebar Banner](/assets/img/interface/sidebar-banner.png)

## Installation

Repository: [https://github.com/publishpress/wordpress-banners](https://github.com/publishpress/wordpress-banners)

We do recommend using composer for adding this library as a requirement:

```shell
$ composer require publishpress/wordpress-banners
```

## How to use it

This library doesn't autoload, so is required to add this code in your plugin main file:
```php
<?php
if (!defined('PP_WP_BANNERS_VERSION')) {
    require_once __DIR__ . '/vendor/publishpress/wordpress-banners/banners.php';
}
```

**Only free plugins should initialize this library**.

Call `pp_display_banner()` somewhere in a custom admin page with all the appropriate params:

```php
<?php
$banners = new PP_WP_Banners();
$banners->pp_display_banner(
  $heading,
  $title,
  $contents,
  $link,
  $link_title,
  $image
);
```

### Params

* `$heading`: Custom heading; disabled if blank
* `$title`: Custom title; disabled if blank
* `$content`: Content to display. e.g. Feature list or a single paragraph
* `$link`: Link to apply to button and image
* `$link_title`: Link title
* `$image`: A filename from assets/images/ folder; disabled if blank

Using Capabilities plugin banner inviting to install Permissions as example, this will be the result:

```php
<?php
$banners = new PP_WP_Banners();
$banners->pp_display_banner(
    __( 'Recommendations for you', 'capsman-enhanced' ),
    __( 'Control permissions for individual posts and pages', 'capsman-enhanced' ),
    array(
        __( 'Choose who can read and edit each post.', 'capsman-enhanced' ),
        __( 'Allow specific user roles or users to manage each post.', 'capsman-enhanced' ),
        __( 'PublishPress Permissions is 100% free to install.', 'capsman-enhanced' )
    ),
    admin_url( 'plugin-install.php?s=publishpress-ppcore-install&tab=search&type=term' ),
    __( 'Click here to install PublishPress Permissions for free', 'capsman-enhanced' ),
    'install-permissions.jpg'
);
```

`$heading`, `$title` and `$image` can be disabled by setting up as empty strings. As example: `$heading = ''`.

## Display the banner in a two-columns layout

The banner is designed to be outputted in the right sidebar of a custom admin screen. You can wrap the code to call `banners.php` inside an `if-else` validation and define the value of a new constant you'll use in next step to enable/disable a right-left columns layout.

In the example below we check if Permissions Free and Pro are activated. Depending the result, we assign a boolean value to `CAPSMAN_PERMISSIONS_INSTALLED`, a custom constant:

```php
<?php
if (!cme_is_plugin_active('press-permit-core.php') && !cme_is_plugin_active('presspermit-pro.php')) {
	define('CAPSMAN_PERMISSIONS_INSTALLED', false);

	if (!defined('PP_WP_BANNERS_VERSION')) {
	    require_once __DIR__ . '/vendor/publishpress/wordpress-banners/banners.php';
	}
} else {
	define('CAPSMAN_PERMISSIONS_INSTALLED', true);
}
```

The HTML structure when displaying a banner in a sidebar of a custom admin screen is as follows. Please note we use `CAPSMAN_PERMISSIONS_INSTALLED` constant to decide to output `pp-enable-sidebar` CSS class and the banner itself. Optionally also check if `PP_WP_Banners` class already loads.

Don't forget to replace `CAPSMAN_PERMISSIONS_INSTALLED` with your own custom constant.

```php
<div class="pp-columns-wrapper<?php echo !CAPSMAN_PERMISSIONS_INSTALLED ? ' pp-enable-sidebar' : '' ?>">
  <div class="pp-column-left">
      [ Here the main content of an admin page loads. As example: a table, tabs, etc. ]
  </div><!-- .pp-column-left -->
  <?php if( !CAPSMAN_PERMISSIONS_INSTALLED && class_exists('PP_WP_Banners') ) { ?>
      <div class="pp-column-right">
          <?php
          $banners = new PP_WP_Banners();
          $banners->pp_display_banner(
              // Set the params for your banner
          );
          ?>
      </div><!-- .pp-column-right -->
  <?php } ?>
</div><!-- .pp-columns-wrapper -->
```

#### In the practice and using the Capabilities example, this is how the layout will look when the banner is displayed:

![2 Columns Layout](/assets/img/interface/sidebar-banner-2-columns.jpg)

#### ...and when the banner is not displayed:

![1 Column Layout](/assets/img/interface/sidebar-banner-1-column.jpg)
