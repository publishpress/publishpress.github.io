---
layout: page
title: PublishPress Blocks
permalink: /docs/free-pro-versions/blocks
nav_order: 1
parent: Free and Pro Versions
---

# PublishPress Blocks
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---
## Requirements

* [npm](https://www.npmjs.com/)

## Free and Pro

This guidelines applies for both, [PublishPress Blocks Free](https://github.com/publishpress/PublishPress-Blocks/) and PublishPress Blocks Pro versions.

Clone the Github repositories in local.

### NPM dependencies

In terminal, go to the repository:

```
$ cd path/to/PublishPress-Blocks/
```

Install the `npm` dependencies:

```
$ npm install --save-dev
```

Repeat the process for Pro.

Install `gulp-cli` globally:

```
$ npm install --global gulp-cli
```

### Create the plugin installer (zip file)

In order to create a WordPress plugin installer, run the command:

```
$ gulp bundle
```

You can find the zip in `bundled` folder.

### Compile CSS

The CSS is compiled automatically when any `.scss` file is modified after running just once the command:

```
$ npm run compile_css
```

* For the Free repository, the compiled files are stored in `assets/css/` folder.
* For the Pro repository, the compiled file is `assets/css/blocks-pro.css`.

### Compile Javascript

The Javascript for the blocks is compiled automatically when any `.jsx` file is modified after running just once the command:

```
$ npm run build_react_dev
```

* For the Free repository, the compiled files are `assets/blocks/blocks.js` and `assets/blocks/frontend.js`.
* For the Pro repository, the compiled file is `assets/blocks/blocks-pro.js`.

To compile/minify other specific javascript files, please refer to the scripts in `package.json`.

## Pro

### Gulp

When running `$ gulp bundle`, be sure to have cloned Free and Pro repositories on the same place, and be aware of the current branch in use for both.

```
.
+-- Parent-Folder
|   +-- PublishPress-Blocks
|   +-- PublishPress-Blocks-Pro
```

**Important!** Please note the `gulpfile.js` merges the files from Free within Pro by using a static local path (mine, lol). I need to figure out a way to allow to set a relative path or your own path before you can create the plugin installer.

### PHP logistic between Free and Pro

The PHP logistic for blocks exclusive in Pro and its setup are defined in `incl/pro-definitions.php`. The methods are called in the Free repository through files inside `incl/` folder.
