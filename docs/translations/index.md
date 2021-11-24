---
layout: page
title: Translations
description: "Documentation for the translations in PublishPress plugins"
permalink: /docs/translations/
has_children: false
nav_order: 11
---

# Translations

This is documentation for the translations in PublishPress plugins.

Important: this case has been tested only with PublishPress Checklists.

## Free vs Pro

The Free version of the plugin contains the translations under its own text domain, `publishpress-checklists` in this example. While the Pro version only includes the POT file with its own domain, `publishpress-checklists-pro` in this example.

### Language files in Free version:
<img width="331" alt="" src="https://user-images.githubusercontent.com/4999794/140989960-6c9236e8-5828-4b7a-84f7-024a2316ee0f.png">

### Language files in Pro:
Note: only include strings exclusive to Pro and misses the language translations from Free (po and mo files).
<img width="323" alt="" src="https://user-images.githubusercontent.com/4999794/140989862-b91ff8a5-f30b-498e-9958-eaa7ac7ce0aa.png">

By having Pro plugin installed, with the Free version deactivated, the language strings from Free works in the Pro version.

## Custom translations

This case applies to end users who wants to create their own translations for a Pro plugin, in this case for PublishPress Checklists Pro, using Loco Translate plugin.

1. Install PublishPress Checklist, the free version
2. Don't activate the plugin
3. Create a new translation through Loco Translate. Choose PublishPress Checklist (free version)
