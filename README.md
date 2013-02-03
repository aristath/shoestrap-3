# [Shoestrap](https://github.com/aristath/shoestrap)

Shoestrap is a WordPress theme that’s based on [HTML5 Boilerplate](http://html5boilerplate.com/) and [Bootstrap from Twitter](http://twitter.github.com/bootstrap/).
It is a fork of the amazing [Roots theme](http://rootstheme.com ) so in case you want to learn more about its core features and logic, [visit the rootstheme doc](https://github.com/retlehs/roots/tree/master/doc)

## Features

* HTML5 Boilerplate’s markup and `.htaccess`
* Bootstrap from Twitter
* Theme wrapper
* Root relative URLs
* Clean URLs (no more `/wp-content/`)
* All static theme assets are rewritten to the website root (`/assets/css/`, `/assets/img/`, and `/assets/js/`)
* Cleaner HTML output of navigation menus
* Cleaner output of `wp_head` and enqueued scripts/styles
* Posts use the [hNews](http://microformats.org/wiki/hnews) microformat
* Multilingual ready
* Extended use of WordPress's customizer (introduced in WordPress 3.4
* Uses less for styling and includes a php-less compiler.
* The compiled css is minified.

This theme makes extended use of WordPress's theme customizer. There are 2 modes in the customizer:

* Standard mode
* Advanced Builder mode

## Standard mode:

To use the standard mode, visit the "Advanced" section of your customizer, and make sure that the "Toggle the advanced Bootstrap Builder" checkbox ***is not*** checked.
The following options are available when using the standard mode:

#### Logo

* Upload a logo image

#### Navbar

* Display NavBar on the top of the page
* Display Branding (Sitename or Logo)
* Use Logo (if available) for branding
* Navbar Color
* Show Login/Logout Link  Display Social Links in the Navbar

#### Header

* Display Extra Header
* Header Region Background Color
* Header Region Text Color
* Display Social Links
  
#### Layout

* Responsive / Fixed-width
* Layout
* Primary Sidebar Width
* Secondary Sidebar Width
* Show sidebars on the Home Page

#### Typography

* Choose from 550+ Google Webfonts for your site
* Apply the webfont on the Site-Name, Headers or everywhere

#### Footer

* Select the background color for your footer.

#### Hero Region

* Title
* Content (accepts HTML)
* Call To Action Button label
* Call To Action Button link
* Call To Action Button color (select from 5 variations)
* Background Color
* Background Image
* Text Color
* Visibility of the Hero Region (Frontpage only or site-wide)

#### Social Links

* Facebook Page Link
* Twitter URL or @username
* Google+ Profile Link
* Pinterest Profile Link
* Share Buttons on Posts: Facebook
* Share Buttons on Posts: Twitter
* Share Buttons on Posts: Google Plus
* Share Buttons on Posts: Linkedin
* Share Buttons on Posts: Pinterest
* Location of social shares

#### Colors

* Background Color
* Links Color
* Buttons Color

#### Navigation

* Select a WordPress Menu for your navbar navigation

#### Advanced

* Header Scripts - Allows users to enter their own css and/or scripts on the Head of the document
* Footer Scripts - Allows users to enter their own css and/or scripts on the Footer of the document
* Toggle the advanced Bootstrap Builder

#### Background Image

* Background Image


## Advanced Mode:

To use the advanced mode, click on Themes, hen click on the Shoestrap link where you'll find the "Enable Developer Mode" checkbox.
When using this mode, **bootstrap's variables.less file is updated to include the user's options and the stylesheet file will be re-compiled with these options.
This way users can alter most bootstrap defaults.

Since by using the advanced mode **the changes are permanent and written to the filesystem**, it is not possible to use this mode on multisite installations. **Only super-admins can use the advanced mode in multi-site.**

The [default bootstrap customizer](http://twitter.github.com/bootstrap/customize.html) has an excessive amount of options available and can be a bit scary and confusing.
So we tried to minimize the options available by calculating many options based on the ones you make:

* **@black, @grayDarker, @grayDark, @gray, @grayLight, @grayLighter:** Calculated based on the background color and the text-color.
* **@borderRadiusLarge, @borderRadiusSmall:** Calculated based on the Base Border Radius.
* **@linkColorHover:** Calculated based on the link color.
* **@tableBackgroundAccent, @tableBackgroundHover, @tableBorder:** Calculated based on the background color.
* **@horizontalComponentOffset, @gridColumnWidth, @gridColumnWidth1200, @gridColumnWidth768, :** Based on layout options

The following options are **not available** when using the advanced mode:

#### Navbar

* Navbar Color

In addition to the default customizer options, the following options are available:

#### Layout

* Grid Width - Normal
* Grid Width - Wide
* Grid Width - Narrow
* Grid Gutter - Normal & Narrow
* Grid Gutter - Wide

#### Typography

* Sans Font Family
* Serif Font Family
* Mono Font Family
* Base Font Size
* Base Line Height
* Font Size Large
* Font Size Small
* Font Size Mini

#### Advanced

* Base Border Radius

#### Colors

* Background Color
* Text Color
* Blue
* Dark Blue
* Green
* Red
* Yellow
* Orange
* Pink
* Purple
* Links Color
* Primary Buttons Color
* Info Buttons Color
* Success Buttons Color
* Warning Buttons Color
* Danger Buttons Color
* Navbar Background

## Automatic Updates

When you get this theme from http://bootstrap-commerce.com/downloads/downloads/shoestrap/ a licence key will be emailed which when entered and activated will provide you with automatic updates
