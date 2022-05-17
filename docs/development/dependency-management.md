---
layout: page
title: Dependency Management
permalink: /docs/development/dependency-management
parent: Development
nav_order: 5
---

# Dependency Management
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Dependencies on PHP

We use [Composer](https://getcomposer.org/) as dependency manager for any 3rd party library or even the [Free plugin in the Pro plugin]({% link docs/free-pro/index.md %}).

**Considering we still support PHP 5.6, we should use composer v2.2 instead of using new versions. PHP 5 support was dropped on v2.3.0. The [v2.2 is a LTS version supported at least until end of 2023](https://github.com/composer/composer/issues/10340)**

See the documentation for adding support to "composer/installers": [Preparing for Composer]({% link docs/development/preparing-composer.md %})

## Dependencies on JavaScript

For the JS dependencies, usually for development tools onl, we use [npm](https://www.npmjs.com/).
