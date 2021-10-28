---
layout: page
title: Interface
description: "Documentation for the interface process"
permalink: /docs/interface/
nav_order: 6
---

# Interface

Documentation for the UI elements.

## Buttons

![Primary button](/assets/img/interface/primary-button.png)

Primary button uses `button button-primary` classes along with CSS to override the default style from primary button from WordPress core.

Input type submit:

```
<input type="submit" class="button button-primary" value="Primary button">
```

Button:

```
<button class="button button-primary">Primary button</button>
```

Link:

```
<a href="#" class="button button-primary">Primary button</a>
```

## Horizontal Tabs

![Horizontal tabs](/assets/img/interface/horizontal-tabs.png)

The HTML structure for horizontal tabs is as follows along with Javascript and CSS to override the default style from tabs from WordPress core.

```
<ul class="nav-tab-wrapper">
    <li class="nav-tab nav-tab-active">
      <a href="#pp-tab-1">Tab 1</a>
    </li>
    <li class="nav-tab nav-tab-active">
      <a href="#pp-tab-2">Tab 2</a>
    </li>
    <li class="nav-tab nav-tab-active">
      <a href="#pp-tab-3">Tab 3</a>
    </li>
</ul>

<div id="pp-tab-1">
  First tab content
</div>
<div id="pp-tab-2" style="display:none;">
  Second tab content
</div>
<div id="pp-tab-1" style="display:none;"
  Third tab content
</div>
```
