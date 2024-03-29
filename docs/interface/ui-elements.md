---
layout: page
title: UI Elements
permalink: /docs/interface/ui-elements
parent: User Interface
nav_order: 1
---

# Interface
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---
This is the documentation for the UI Elements in PublishPress plugins.

## Buttons

![Primary button](/assets/img/interface/primary-button.png)

The primary button in PublishPress plugins uses `button button-primary` classes along with CSS to override the default style from primary button from WordPress core.

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
    <li class="nav-tab">
      <a href="#pp-tab-2">Tab 2</a>
    </li>
    <li class="nav-tab">
      <a href="#pp-tab-3">Tab 3</a>
    </li>
</ul>

<div id="pp-tab-1">
  First tab content
</div>
<div id="pp-tab-2" style="display:none;">
  Second tab content
</div>
<div id="pp-tab-3" style="display:none;">
  Third tab content
</div>
```

## Vertical Tabs

![Vertical tabs](/assets/img/interface/vertical-tabs.png)

The HTML structure for vertical tabs is as follows along with Javascript and CSS. Let's take PublishPress Capabilities main screen as example.

```
<div class="postbox">
  <div class="pp-tabs">
    <ul>
      <li data-content="pp-tab-1" class="pp-tab-active">Tab 1</li>
      <li data-content="pp-tab-2">Tab 2</li>
      <li data-content="pp-tab-3">Tab 3</li>
    </ul>
  </div>
  <div class="pp-content">
    <div id="pp-tab-1">
      First tab content
    </div>
    <div id="pp-tab-2" style="display:none;">
      Second tab content
    </div>
    <div id="pp-tab-3" style="display:none;">
      Third tab content
    </div>
</div>
```

## Settings

![Settings](/assets/img/interface/settings.png)

The HTML structure for settings is as follows. One table row for each setting. Usually Settings are inside <a href="#horizontal-tabs">Horizontal Tabs</a> content.

```
<table class="form-table">
    <tr>
      <th scope="row">
        Label
      </th>
      <td>
          <input> Optional setting purpose
          <p class="description">Optional description</p>
      </td>
    </tr>
    <tr>
      <th scope="row">
        Label
      </th>
      <td>
          <input> Optional setting purpose
          <p class="description">Optional description</p>
      </td>
    </tr>
</table>
```
