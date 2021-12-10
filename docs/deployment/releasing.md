---
layout: page
title: Releasing 
permalink: /docs/deployment/releasing
nav_order: 3
parent: Deployment
---

# Releasing
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## The release window

Releases should only happen between Monday and Thursday. We don’t want to disrupt the weekends for customers or our staff.
The only exception to this release schedule is in case of an absolute emergency.

Before releasing, please make sure you still have a few hours available before leaving. It is good to be around in case
anything goes really wrong.

## How to release

Every release on PublishPress is mostly a manual process, so in order to avoid mistakes we do advise following a checklist on every release.
A good practice is to add a GitHub issue template on every Free plugin repository, according to the examples below:

### GitHub Issue Template for the checklists

Save the following files in the repository's `.github` subfolder: 

* [Free plugin's checklist template file](../../examples/release-free-plugin.md.dist) at `.github/ISSUE_TEMPLATE/release-free-plugin.md`.
* [Pro plugin's checklist template file](../../examples/release-pro-plugin.md.dist) at `.github/ISSUE_TEMPLATE/release-pro-plugin.md`.

On every release, go to the GitHub issues page for the respective repository and create a new issue selecting one of templates above.
Work on each step checking the boxes, then close the issue after finishing the process and 

### Base Checklist for Free plugins

```markdown
### Pre-release Checklist

- [ ] Create the release branch as `release-<version>` based on the development branch
- [ ] Make sure to directly merge or use Pull Requests to merge hotfixes or features branches into the release branch
- [ ] Run `composer update` and check if there is any relevant update. Check if you need to lock the current version for any dependency. The `--no-dev` argument is optional here, since the build script will make sure to run the build with that argument.
- [ ] Update the changelog - make sure all the changes are there with a user-friendly description and that the release date is correct
- [ ] Update the version number to the next stable version. Use `$ vendor/bin/robo version <version-number>`
- [ ] Commit the changes to the release branch
- [ ] Build the zip package using `$ vendor/bin/robo build`. It should create a package in the `./dist` dir.
- [ ] Send to the team for testing

### Release Checklist

- [ ] Create a Pull Request and merge the release branch it into the `master/main` branch
- [ ] Merge the `master/main` branch into the `development` branch
- [ ] Create the Github release (make sure it is based on the `master/main` branch and correct tag)

#### SVN Repo
- [ ] Cleanup the `trunk` directory.
- [ ] Unzip the built package and move files to the `trunk`
- [ ] Remove any eventual file that shouldn't be released in the package (if you find anything, make sure to create an issue to fix the build script)
- [ ] Look for new files `$ svn status | grep \?` and add them using `$ svn add <each_file_path>`
- [ ] Look for removed files `$ svn status | grep !` and remove them `$ svn rm <each_file_path>`
- [ ] Create the new tag `$ svn cp trunk tags/<version>`. [Read more](https://developer.wordpress.org/plugins/wordpress-org/how-to-use-subversion/#create-tags-from-trunk).
- [ ] Commit the changes `$ svn ci -m 'Releasing <version>'`
- [ ] Wait until WordPress updates the version number and make the final test updating the plugin in a staging site
```

### Base Checklist for Pro plugins

```markdown
### Pre-release Checklist

- [ ] Create the release branch as `release-<version>` based on the development branch
- [ ] Make sure to directly merge or use Pull Requests to merge hotfixes or features branches into the release branch
- [ ] Update the `composer.json` file changing the version constraint to the Free plugin to use the most recent stable release tag
- [ ] Run `composer update` and check if there is any relevant update. Check if you need to lock the current version for any dependency. The `--no-dev` argument is optional here, since the build script will make sure to run the build with that argument.
- [ ] Update the changelog - make sure all the changes are there with a user-friendly description and that the release date is correct
- [ ] Update the version number to the next stable version. Use `$ vendor/bin/robo version <version-number>`
- [ ] Commit the changes to the release branch
- [ ] Build the zip package using `$ vendor/bin/robo build`. It should create a package in the `./dist` dir.
- [ ] Send to the team for testing

### Release Checklist

- [ ] Create a Pull Request and merge the release branch it into the `master/main` branch
- [ ] Merge the `master/main` branch into the `development` branch
- [ ] Create the Github release (make sure it is based on the `master/main` branch and correct tag)
- [ ] Update EDD registry and upload the new package
- [ ] Make the final test updating the plugin in a staging site
```
