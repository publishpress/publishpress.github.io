# PublishPress Development

Site with the documentation for developing PublishPress plugins.

This is a static site created using Jekyll and hosted in GitHub Pages.

## How to edit the content of the site

All the content can be added as markdown documents or plain HTML files.

You can just edit the markdown files and commit the changes to the master branch. 
GitHub Pages will take care of deploying it.

## Requirements for testing locally

More information on [GitHub Docs](https://docs.github.com/en/github/working-with-github-pages/setting-up-a-github-pages-site-with-jekyll) or [Jekyll Docs](https://jekyllrb.com/docs/installation/)

* Ruby 2.5.0 or above
* RubyGems
* GCC and Make 

## How to test locally

Run the following command to start the local server:

```shell script
$ bundle exec jekyll serve
``` 

## How to update the Gems

Load the project directory in the terminal and run:

```shell script
$ bundle update
```
