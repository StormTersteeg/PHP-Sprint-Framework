## SPRINT-V3

<img src="https://one.dontdalon.com/assets/img/sprint_banner.png">

## Table of Contents

* [About the Project](#about-the-project)
  * [Features](#features)
  * [Default resources](#default-resources)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
* [Creating pages](#creating-pages)
  * Adding a page
  * Removing stock areas
  * Stock area behavior
* [License](#license)


## About The Project

Sprint is a project I made to be able to pass my web development exams without having to depend on any frameworks. What exactly is Sprint? Calling Sprint a framework would be a bit of an overstatement. It's a project template containing a handful of useful features, which allows any programmer to deploy a website or webapp without hassle.

Why use Sprint when there are a lot of great frameworks that contain a lot of features? Sprint doesn't do a lot of things, unlike wordpress or laravel for example. But it's very quick and it's easy to modify. Using a framework like wordpress to create a website always makes me feel like I'm using sledgehammer to crack a nut.
<br />


### Features
In short? Pretty urls, forced https, MVC layout, dual database, resource control, resource piling and more.

**A little more in depth:**
* Easy to use pretty url system
	* `/about` instead of `/about.html`
* Premade MVC folder layout
* Forced `HTTPS` setting
* Simple dual database setting
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
* [Google Material Icons V48] (https://material.io/resources/icons/?style=baseline)
* [Jquery 3.4.1] (https://api.jquery.com/)
* [Bootstrap JS 4.1.1] (https://getbootstrap.com/docs/4.1/getting-started/introduction/)
* [Popper 1.14.3] (https://popper.js.org/docs/v1/)
* [Roboto Font] (https://fonts.google.com/specimen/Roboto)
<br />


## Getting Started

To start, clone the project. Now give the folder a unique name, I'm going to be using `my_project` for example.

It is possible to add any resource to this project if you want to, I will explain this in the **resources** section.
(For example charts.js or any front-end library)

### Prerequisites

To work with Sprint you need a webserver and a PHP environment. I recommend XAMPP. Make sure your sprint project is inside of a webserver directory (like htdocs).

There are no installation steps, sprint configuration is purely file based.
<br />


## Creating pages

**Adding a page**
The `areas` directory contains all your pages, each directory resembles a page. To create a new `/page`, create a directory in `areas`. Within this directory add another directory called `views`. Add an index.php file to this directory. You should end up with the following path:

> areas/my_page/views/index.php

This new page is now accessible as `localhost/my_project/my_page`.
(or as `localhost/my_page` if you're using your entire htdocs as the project root)
<br />

**Removing stock areas**
In the `areas` folder you will find the `controller` and `index` area, you can remove them. The `controller` and `index` area only function as examples. The `404` area will be displayed when an unknown area is being called by a user, you can modify it to your liking.
<br />

**Stock area behavior**
By default, two area names have special characteristics, these areas are `index` and `controller`. The index area functions as the index of your project, this means that it's accessible at `localhost/my_project/index` but also at `localhost/my_project`.
<br />

## Resources


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
