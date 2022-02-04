---
layout: page
title: Tests
permalink: /docs/development/tests
nav_order: 11
parent: Development
---

# Tests
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
   {:toc}

---

## Codeception and WP-Browser

We use Codeception as the framework for creating and running tests. It supports different types of tests, like:

* Unit
* Acceptance
* Integration
* Functional

The tests are separated in suites, one suite for each type of test, but you still can have multiple suites for the same
type of test if you need to create a different environment for specific tests.

/* @todo: add more details about each type of tests and why, or how we use them */

[WP-Browser](https://github.com/lucatume/wp-browser) is a library that allows to create tests for WordPress plugins, themes
or whole site.

Instead of installing Codeception, you have to install WP-Browser, which has codeception as requirement.

## Installing the requirements

Add this to the `composer.json` file:

```json
{
   "require-dev": {
      "lucatume/wp-browser": "^3",
      "codeception/module-asserts": "^1.0",
      "codeception/module-phpbrowser": "^1.0",
      "codeception/module-webdriver": "^1.0",
      "codeception/module-db": "^1.0",
      "codeception/module-filesystem": "^1.0",
      "codeception/module-cli": "^1.0",
      "codeception/util-universalframework": "^1.0",
      "codeception/module-rest": "^1.3",
      "codeception/module-sequence": "^2.0"
   }
}
```

## Configuring

The configuration is done creating a file named `.env.testing` in the project root folder. If the repository provies a dist
file for it, as `.env.testing.dist`, copy it and edit.

The file should have at least the following settings:

```
TEST_SITE_DB_DSN="mysql:host=127.0.0.1;port=15101;dbname=tests"
TEST_SITE_DB_NAME="tests"
TEST_SITE_DB_USER="root"
TEST_SITE_DB_PASSWORD="root"
TEST_SITE_TABLE_PREFIX="wp_"
TEST_SITE_ADMIN_USERNAME="admin"
TEST_SITE_ADMIN_PASSWORD="admin"
TEST_SITE_WP_ADMIN_PATH="/wp-admin"
WP_ROOT_FOLDER="/home/youruser/DevKinsta/public/tests"
TEST_DB_NAME="tests"
TEST_DB_HOST="127.0.0.1:15101"
TEST_DB_USER="root"
TEST_DB_PASSWORD="root"
TEST_TABLE_PREFIX="wp_"
TEST_SITE_WP_URL="https://tests.local"
TEST_SITE_WP_DOMAIN="tests.local"
TEST_SITE_ADMIN_EMAIL="admin@tests.local"
PUBLISHPRESS_API_URL="https://publishpress.com"
```

Please, configure the IPs and URLs according to your system.

I do recommend using [DevKinsta](https://kinsta.com/devkinsta/) or [Local WP](https://localwp.com/) for creating the local
environment, instead of installing Apache/Nginx, MySQL, directly on the machine. PHP is still required locally for running
the build, tests and other scripts. DevKinsta has the advantage of using Docker containers, which has many advantages we
will talk about in another documentation page.

If you use DevKinsta, the configuration will be very similar to the snippet above. But in case you are running Loca WP,
the settings will be something like:

```
TEST_SITE_DB_DSN="mysql:unix_socket=/Users/youruser/Library/Application Support/Local/run/MS_83oTyf/mysql/mysqld.sock;dbname=ui_tests"
TEST_SITE_DB_NAME="ui_tests"
TEST_SITE_DB_USER="root"
TEST_SITE_DB_PASSWORD="root"
TEST_SITE_TABLE_PREFIX="wp_"
TEST_SITE_ADMIN_USERNAME="admin"
TEST_SITE_ADMIN_PASSWORD="admin"
TEST_SITE_WP_ADMIN_PATH="/wp-admin"
WP_ROOT_FOLDER="/Users/youruser/Local Sites/tests/app/public/"
TEST_DB_NAME="local"
TEST_DB_HOST="localhost:/Users/youruser/Library/Application Support/Local/run/MS_83oTyf/mysql/mysqld.sock"
TEST_DB_USER="root"
TEST_DB_PASSWORD="root"
TEST_TABLE_PREFIX="wp_"
TEST_SITE_WP_URL="https://tests.local"
TEST_SITE_WP_DOMAIN="tests.local"
TEST_SITE_ADMIN_EMAIL="admin@tests.local"
PUBLISHPRESS_API_URL="https://publishpress.com"
```

If you are using another stack, you need to customize those settings to match your environment.

## Creating and maintaining tests

Codeception supports different types of tests. But we prefer using [Cest](https://codeception.com/docs/07-AdvancedUsage.html#Cest-Classes),
which provides an objects oriented structure, and `Gherkin`, for a ubiquitous language on [BDD](https://codeception.com/docs/07-BDD) style tests.

### Good practices

/* @todo: describe good practices here */

## Running the tests

We recommend using [PHPStorm](https://www.jetbrains.com/phpstorm/) as the IDE for coding, but feel free to use any other
like [Visual Studio Code](https://code.visualstudio.com/). Both have support for Codeception tests.

The way you run tests using the IDE is different for each IDE. But for running it in the command line, you can run:

```bash
vendor/bin/codecept run
```

That will run all the tests, from all the suites. In case ou want to run specific suites, you can use the command (acceptance for example):

```bash
vendor/bin/codecept run acceptance
```

For running tests in only one file, use this:

```bash
vendor/bin/codecept run acceptance folders/of/the/file/filename.php
```

And for running only one specific test, use this:

```bash
vendor/bin/codecept run acceptance folders/of/the/file/filename.php:theTestFunctionName
```
