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

## How to update the search data

The theme "Just the Docs" provide a search field which looks for the site data on a JSON file.
Use the following command to udpate the search data after changing any content.

```shell script
$ bundle exec just-the-docs rake search:init
```

## How to update the live site

You just need to commit the changes to the `master` branch. Github will detect the push event and will update the site in a few minutes.

The site is live at [https://publishpress.github.io](https://publishpress.github.io)
