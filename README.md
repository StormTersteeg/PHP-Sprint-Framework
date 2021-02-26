## SPRINT-V3

<img src="https://one.dontdalon.com/assets/img/sprint_banner.png">

## Table of Contents

* [About the Project](#about-the-project)
  * Features
  * Default resources
* [Getting Started](#getting-started)
  * Prerequisites
* [Creating pages](#creating-pages)
  * Adding a page
  * Removing stock areas
  * Stock area behavior
* [Resources (stylesheets and scripts)](#resources)
  * Preload & Afterload
  * Adding resources
  * Resource stacking
* [Settings](#settings)
  * $resource_blacklist
  * $use_resource_stacking
  * $use_forced_https
  * $use_production_db
* [Database / Controller](#database-and-controller)
* [Icons](#icons)
* [License](#license)
<br />

## About The Project

Sprint is a project I made to be able to pass my web development exams without having to depend on any frameworks. What exactly is Sprint? Calling Sprint a framework would be a bit of an overstatement. It's a project template containing a handful of useful features, which allows any programmer to deploy a website or webapp without hassle.

Why use Sprint when there are a lot of great frameworks that contain a lot of features? Sprint doesn't do a lot of things, unlike wordpress or laravel for example. But it's very quick and it's easy to modify. Using a framework like wordpress to create a website always makes me feel like I'm using sledgehammer to crack a nut.
<br />


### Features
In short? Pretty urls, forced https, MVC layout, database class, resource control, resource piling and more.

**A little more in depth:**
* Easy to use pretty url system
	* `/about` instead of `/about.html`
* Premade MVC folder layout
* Forced `HTTPS` setting
* Simple database class
	* To easily switch between production and deployment databases
* Resource spreading feature
	* Want to load a certain script at the end of the body on every page? easy.
* Request limiting feature
	* Compiles all your resources upon requests
* Resource free pages
	* Have a controller page on which you don't want to load any resources? add it to the content-blocklist
<br />


### Default resources

Sprint is packaged with a few resources that I consider to be useful. These resources are recommendations, and I often use them myself, they are not requirements. 

* [Daemonite Material Design 4.1.1] (http://daemonite.github.io/material/docs/4.1/getting-started/introduction/)
* [Google Material Icons] (https://material.io/resources/icons/?style=baseline)
* [Jquery 3.5.1] (https://api.jquery.com/)
* [Bootstrap JS 4.1.1] (https://getbootstrap.com/docs/4.1/getting-started/introduction/)
* [Popper 1.14.3] (https://popper.js.org/docs/v1/)
* [Roboto Font] (https://fonts.google.com/specimen/Roboto)
<br /><br />



## Getting Started

To start, clone the project. Now give the folder a unique name, I'm going to be using `my_project` for example. Remove any unwanted files like `.git` and `README.md`.

It is possible to add any resource to this project if you want to, I will explain this in the [resources](#resources) section.
(For example charts.js or any front-end library)

### Prerequisites

To work with Sprint you need a webserver and a PHP environment. I recommend XAMPP. Make sure your sprint project is inside of a webserver directory (like htdocs).

There are no installation steps, sprint configuration is purely file based.
<br /><br />



## Creating pages

**Adding a page**<br />
The `areas` directory contains all your pages, each directory resembles a page. To create a new `/page`, create a directory in `areas`. Within this directory add another directory called `views`. Add an index.php file to this directory. You should end up with the following path:

> areas/my_page/views/index.php

This new page is now accessible as `localhost/my_project/my_page`.
(or as `localhost/my_page` if you're using your entire htdocs as the project root)
<br /><br />

**Removing stock areas**<br />
In the `areas` folder you will find the `controller` and `index` area, you can remove them. The `controller` and `index` area only function as examples. The `404` area will be displayed when an unknown area is being called by a user, you can modify it to your liking.
<br /><br />

**Stock area behavior**<br />
By default, two area names have special characteristics, these areas are `index` and `controller`. The index area functions as the index of your project, this means that it's accessible at `localhost/my_project/index` but also at `localhost/my_project`.
<br /><br />


## Resources

In `assets/resources` you will find a `custom` directory which contains an empty stylesheet and script file, which have already been added to the resource system. This means they will be included on every page except for pages that have been added to the `resource-blacklist`. More about the `resource-blacklist` [here](#resource-blacklist).

To use custom stylesheets and script files, I would very much recommend you to use the `preload` and `afterload` system (instead of directly linking to them within your html).
<br />

**Preload & Afterload**<br />
In the `sprint` directory you will find `resource-preload.php` and `resource-afterload.php`. In these files you can declare two types of resources:

 1. Resources that should be loaded before the first contentful paint - `resource-preload.php`
 2. Resources that should be loaded at the end of the body - `resource-afterload.php`

Generally speaking, you want to add your stylesheets to preload and your scripts to afterload. Using this system will improve your user experience because big scripting files are being loaded after the content is displayed.
<br />

**Adding resources**<br />
As an example, add the following line to your `resource-preload.php` to add a new resource (in this case "zebra.css"):
> import("assets/resources/zebra/zebra.css");

The import() function recognizes different types of files and it will generate the right type of \<link> accordingly.
<br />

**Resource stacking**<br />
Resource stacking is a sprint feature that compiles all your resources together with your html, to lower the amount of requests made. This feature generally improves load times. The idea is that making one big request is better than making tons of small requests. It can be enabled/disabled in `sprint/settings.php`.

**WARNING**
Resource stacking can only be used when all your preload and afterload resources are stored locally.
<br /><br />


## Settings

**$execution_mode**<br />
> Type: String<br />
> Default value: 'strict'<br />
> Possible values: 'quiet', 'oblivious', 'strict'

Sprint uses a small set of internal functions, these funtions can display debug information:<br />
- quiet: display no debug information<br />
- oblivious: display debug information<br />
- strict: display debug information, and exit; after encountering issues
<br /><br />

**$resource_blacklist**<br />
> Type: Array<br />
> Default value: ["controller"]

This value contains a list of pages on which you **don't** want to load any of the resources declared in `resource-preload.php` and `resource-afterload.php`. Imagine you have a PHP controller area that is only being posted to, adding this area to the resource_blacklist will be beneficial since the controller doesn't require any of the stylesheets or scripts.

The resource_blacklist is also useful if you have a specific page that doesn't require any of the stylesheets or scripts.
<br /><br />

**$use_resource_stacking**<br />
> Type: Bool<br />
> Default value: TRUE

Resource stacking is a sprint feature that compiles all your resources together with your html, to lower the amount of requests being made. This feature generally improves load times. The idea is that making one big request is better than making tons of small requests. It can be enabled or disabled.

**WARNING**
Resource stacking can only be used when all your preload and afterload files are stored locally.
<br /><br />

**$use_forced_https**<br />
> Type: Bool<br />
> Default value: FALSE

Bool used to force users to use HTTPS.
<br /><br />

**$database_model**<br />
> Type: String (String by default)<br />
> Default value: 'local'

Setting used to switch between credential set. These sets are stored in `$database_credentials`.

This can be useful if there are differences between your local and your production database.
<br /><br />

**$database_credentials**<br />
> Type: Array<br />
> Default value:<br />
    array(<br />
        'local' => array('localhost', 'root', ''),<br />
        'production' => array('localhost', 'root', '')<br />
    )

Used to store all available database credential sets.
<br /><br />



## Database and Controller
Sprint does not require a database to function, but it does contain a set of useful examples. As explained in the [settings](#settings) section, you can switch between sets of database credentials by toggling `$database_model` (in `sprint/settings.php`).

In general, I like to use a single controller to which I do all my posts. Sprint includes this controller and you can delete it if you want to, it's not a requirement.

In `areas/controller/functions.php` you can find SQL query examples and in `areas/index/views/index.php` you can find an example on how to retrieve data from the controller using Jquery.
<br /><br />


## Icons
In assets you can find two images called `favicon.png` and `logo.png`. `favicon.png` will be used as the favicon of your project, and `logo.png` will be used when a user creates a shortcut to your project on a mobile device.
<br /><br />


## License

MIT License
Copyright (c) 2020 Storm-Julian Tersteeg

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=flat-square
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/stormtersteeg
[product-screenshot]: images/screenshot.png
