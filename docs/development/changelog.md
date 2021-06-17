---
layout: page
title: Changelog
permalink: /docs/development/changelog
parent: Development
nav_order: 10
---

# Changelog
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC 
{:toc}

---

Documentation based on [Keepchangelog](https://keepachangelog.com/).

## Version Number Specification

It is important to note that our plugins follow the [Semantic Versioning](https://semver.org/) specification.

## How to make it easier to maintain a changelog

It is easier to track changes and maintain the changelog if you always keep an `UNRELEASED` section at the top to track changes you are working on, or upcoming changes.

Remember to always commit the change with its specific changelog on the `readme.txt`. Every pull request, should have its changelog record. This can create conflicts while merging the branches, but those are pretty easy to solve before committing the merge.

Doing it step by step on every pull request helps to avoid missing any change you did, and sometimes it is easier to write about the change, in a human readable way, when you have it fresh in your mind (while you are working on it). It can take days, or weeks until the next release, and sometimes it is easy to forget something that would be important to say to the users about the specific change.

Do that with two purposes in mind:

* Other developers (sometimes yourself) can see what changes to expect in upcoming releases.
* At release time you will remove the `UNRELEASED` section and make it a release version section.

### Example

Considering we are working on the plugin PublishPress, which stable version is `4.2.2`, fixing the bug `#851`.

The current `readme.txt` file would have something like:

```
== Changelog ==

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

= [4.2.2] - 2021-04-10 =

* Fixed: Fix the feature E, #931;
* Fixed: Fix the issue X on the feature D, #852;

= [4.2.1] - 2021-04-09 =
* Fixed: Fix that old crazy bug, #315;
.
.
.
```
Before sending the Pull request with the hotfix, you should create (if it doesn't exist yet) the `Unreleased` section, adding the respective changelog for the change you are sending:

```
== Changelog ==

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

= UNRELEASED =

* Fixed: Fix the issue on the feature R, #851;

= [4.2.2] - 2021-04-10 =

* Fixed: Fix the feature E, #931;
* Fixed: Fix the issue X on the feature D, #852;

= [4.2.1] - 2021-04-09 =
* Fixed: Fix that old crazy bug, #315;
.
.
.
```

Commit that change in the changelog, and send the pull request.

Ok, lets say you merged the previous pull request in the development branch, and you are finishing another bug fix, for the issue `#252`. Before sending the pull request, add a new changelog, so it looks like:

```
== Changelog ==

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

= UNRELEASED =

* Fixed: Fix the issue on the feature R, #851;
* Fixed: Fix that bug on the feature U, #252;

= [4.2.2] - 2021-04-10 =

* Fixed: Fix the feature E, #931;
* Fixed: Fix the issue X on the feature D, #852;

= [4.2.1] - 2021-04-09 =
* Fixed: Fix that old crazy bug, #315;
.
.
.
```

Before releasing you can reorganize the `UNRELEASED` section and convert it into a release number section.


## Principles

* Write the changelog for humans, not machines.
* Every version should have a changelog.
* Group changes by type.
* The latest version comes first.
* Always add the release date.
* Use the header text describe below.
* Keep it consistent.
* Always mention the GitHub issue number at the end of the item.

## Header Text

Use the following as the standard header for the changelog section:

```
== Changelog ==

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

```
## Types of changes

* `Added`: for new features.
* `Changed`: for changes in existing functionality.
* `Deprecated`: for soon-to-be removed features.
* `Removed`: for removed features.
* `Fixed`: for any bug fixes.
* `Security`: in case of vulnerabilities.

## Full example

```
== Changelog ==

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

= [3.3.3] - 2021-06-16 =

* Fixed: Fix the feature E, #931;
* Fixed: Fix the issue X on the feature D, #852;

= [3.3.2] - 2021-05-27 =

* Added: Add new feature C, #329;
* Changed: Change the default behavior of feature B, #341;
* Fixed: Fix the icons for the feature A, #95;
```

