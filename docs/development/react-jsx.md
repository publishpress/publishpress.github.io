---
layout: page
title: React JS and JSX Files
permalink: /docs/development/react-jsx
nav_order: 7
parent: Development
---

# React JS and JSX Files
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

Some plugins are using React JS for creating interface elements or Gutenberg blocks. If you plan to use React we do recommend to use [JSX files](https://reactjs.org/docs/introducing-jsx.html).

## Why JSX files?

Please, read the [React JS documentation](https://reactjs.org/docs/introducing-jsx.html).

## Requirements

* [npm](https://www.npmjs.com/)
* [Babel](https://babeljs.io/)
* [Webpack](https://webpack.js.org/)

## Installing

### Configuring npm and installing dependencies

Create a `package.json` file adding the following content:

```json
{
  "name": "my-plugin",
  "version": "1.0.0",
  "description": "My awesome plugin",
  "repository": {
    "type": "git",
    "url": "git+https://github.com/publishpress/my-plugin.git"
  },
  "author": "PublishPress",
  "license": "GPL-2.0-or-later",
  "bugs": {
    "url": "https://github.com/publishpress/my-plugin/issues"
  },
  "homepage": "https://github.com/publishpress/my-plugin#readme",
  "devDependencies": {
    "@babel/core": "^7.3.3",
    "@wordpress/babel-preset-default": "^3.0.2",
    "babel-loader": "8.0.5",
    "babel-minify-webpack-plugin": "^0.3.1",
    "babel-plugin-transform-react-jsx": "^6.24.1",
    "babel-preset-minify": "^0.5.0",
    "cross-env": "^5.2.1",
    "webpack": "4.29.5",
    "webpack-cli": "3.2.3"
  },
  "scripts": {
    "watch": "webpack --watch",
    "build": "cross-env NODE_ENV=production webpack"
  }
}
```

Run the following command:

```
$ npm install
```

Sometimes npm requires to run additional commands like `npm fund` or `npm audit fix`. Just follow the instructions the command will return.


### Configuring Webpack

Create a file `webpack.config.js` with the following content:

```js
const NODE_ENV = process.env.NODE_ENV || 'development';

let path = require('path');

module.exports = {
    mode: NODE_ENV,
    entry: {
        'file-1': './the/path/for/the/file-1.jsx',
        'file-2': './the/path/for/the/file-2.jsx',
        'file-3': './the/path/for/the/file-3.jsx',
    }
    output: {
        path: path.join(__dirname, 'assets/js'),
        filename: '[name].min.js'
    },
    module: {
        rules: [
            {
                test: /.jsx$/,
                exclude: /node_modules/,
                loader: 'babel-loader'
            }
        ]
    }
};
```

Add the .jsx files you want to compile and merge in the `entry` attribute.

## Compiling JSX files

Considering you added the specific scripts entry to the `package.json` file you can run the commands:

```bash
$ npm run build
```

This command will call webpack and compile the files you added to the `entry` attribute,
merging and minimizing the final file, which will be added to the `assets/js` folder, by default.
Feel free to customize the output path if needed.

You can enqueue the minimized JS file (added to `assets/js` folder by default).

The build command should be ran after every change to the JSX file otherwise the changes won't be added to the JS file.
So to avoid calling that command every time you can use the webpack's `--watch` parameter running:

```bash
$ npm run watch
```  

That command will start a script that will be watching for changes on the selected files and compiling the JSX file automatically.
