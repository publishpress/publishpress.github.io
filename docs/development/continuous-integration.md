---
layout: page
title: Continuous Integration
permalink: /docs/development/continuous-integration
parent: Development
nav_order: 8
---

# Continuous Integration
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

## Github Actions

[Documentation](https://docs.github.com/en/actions)

### Debugging a Github Action

A good way for debugging an action is getting SSH access while a workflow is running.
We can achieve this using [tmate](https://tmate.io/), a instant terminal sharing. 

First we need to create a new branch based on the one we want to test.

Edit the workflow file, for example `.github/workflows/ci.yml` making sure to add the new branch to the "push" event:

```yaml
on:
  push:
    branches: [ master, development, your-new-branch ]
```
After identifying the job you want to test, put the following step:

````yaml
- name: Setup tmate session
  uses: mxschmitt/action-tmate@v2
```` 

It should be like this:

```yaml
name: CI

on:
  push:
    branches: [ master, development, your-new-branch ]
  pull_request:
    branches: [ master, development ]

jobs:
  test:
    name: Tests
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v2
      - name: Composer install
        uses: php-actions/composer@v1
      - name: Run codeception tests
        run: vendor/bin/codecept run
      - name: Setup tmate session
        uses: mxschmitt/action-tmate@v2
```

Push this new branch, or the changes to the remote repository to trigger the workflow.

The tmate step will pause the workflow and show you a https URL and SSH command you can use to connect to the terminal
session which is running your workflow.

![Paused Workflow Example](/assets/img/paused-github-action-example.png "Paused Workflow Example")

Using the https URL you can use a terminal emulator in the browser, and the ssh command can be used on your local terminal.
With the terminal session opened you are free to make the required tests and debug action you want to run.

After finishing the tests you just need to create an empty file called `continue`, using the followed the command:

```bash
$ touch continue
```

When that file exists in the project dir the workflow will be un-paused continuing the flow. Alternatively you can use
the button "Cancel workflow" in the Github action details page (check the image above).

After finding the bug you are free to delete the temporary branch and do the required fixes in the branch you detected
the failure. 

:warning: **Warning! This method works very well for debugging but if you have SECRETS on the repository settings/account
they could be exposed for anyone that is following the workflow and use the provided URL!** But since those are shared
sessions you would know if anyone is typing anything on your session. 
