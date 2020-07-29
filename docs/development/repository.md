---
layout: page
title: Repository Organization
permalink: /docs/development/repository
nav_order: 1
parent: Development
---

# Repository Organization
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Default directory structure

### README.md 

Github uses this file to display a readme text in the repository. It is very important to have at least the following sections:

```markdown

Welcome to the [PLUGIN NAME] repository on GitHub. 
We recommend all developers to follow the [PublishPress development documentation](https://publishpress.github.io) and
the [PublishPress blog](https://publishpress.com/blog/) to stay up to date about the project's guidelines and everything happening in the project.

## Description

[Short description for the plugin.]

## Documentation

* Plugin Documentation(https://publishpress.com/docs/)
* PublishPress Development Documentation(https://publishrpess.github.io)

## How to report bugs, security issues or send suggestions

Feel free to email us via [help@publishpress.com](mailto:help@publishpress.com). We would love to hear you, and will work hard to help you.

## Installation

:warning: **Warning! This plugin requires to be built before being installed!**

This repository doesn't store external dependencies required by the plugin.
It's not possible to simply clone or download the repository code and have a working WordPress plugin.

We aim to follow good practices on development, and we are using Composer as dependency manager,
which recommends to not add external dependencies into the repository. You can find more information on
their documentation page: [Should I commit the dependencies in my vendor directory?](https://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md)

## How to install?

You can download a built package from [releases page](/releases/) and install it on your WordPress sites by
uploading the zip file.

## How to build a package?

Please, check the instructions on our [documentation pages](https://publishpress.github.io/docs/deployment/building).

## How to contribute?

Please, read our [contributor guidelines](blob/master/.github/CONTRIBUTING.md) for more information how you can help improving this awesome plugin.

## License

License: [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html)
```

If needed, update the URL for the contributor guidelines file.

### RoboFile.php


### readme.txt


### .github/


#### .github/CONTRIBUTING.md

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/CONTRIBUTING.md)

### composer.json


### .gitignore

[Example](https://github.com/publishpress/publishpress.github.io/blob/master/examples/.gitignore)
