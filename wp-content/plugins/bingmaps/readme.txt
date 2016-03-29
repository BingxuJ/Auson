=== BingMaps - Map Viewer ===
Contributors: Malcolm-OPH
Donate link: http://www.corondeck.co.uk/BingMaps/donate.html
Tags: pages, paypal, maps, bing, mapping, ordnance survey, OS, routes, walking
Requires at least: 3.0
Tested up to: 4.2.2
Stable tag: 0.4

The BingMaps plugin adds an interactive map(s) to your Wordpress Page or Post, using the Bing Maps AJAX Control.

== Description ==

An interactive map can be added to your website by adding a single shortcode. The location the map can be specified either by shortcode attribute or URL parameters. Other (optional) values can be added to specify the scale of the map, screen size in pixels, and the map type.

Features Summary

* Adds an interactive map to your Wordpress Page or Page
* Location specified by shortcode attribute
* Image size can be specified by optional shortcode attribute
* Map scale can be specified by optional shortcode attribute
* Displays Ordnance Survey Mapping (GB locale only)
* Shortcode Attributes can be replaced by URL Parameters

== Installation ==

* Download the BingMaps plugin archive
* Open the Wordpress Dashboard for you site
* Select the "Upload" option 
* Click "Add New" under the "Plugins" menu 
* Under "Install a plugin in .zip format" browse to the BingMaps plugin archive file you downloaded
* Click Install Now.
* After it has installed, activate the plugin.
* Go to the settings page and enter your BingMaps key

== Frequently Asked Questions ==

= How do I set up BingMaps? =

* Install the plugin and activate it
* Go to http://www.bingmapsportal.com and sign up to get a free BingMaps key
* Go to the BingMaps - Settings page and enter your BingMaps key
* Create a page on your website to contain the map (or edit an existing one) and add the shortcode to it
		
= How do I add a map to my site? =

Add the shortcode to either a new or existing page on your site. 

= How do I specify the map coordinates in the shortcode? =

Some typical shortcodes, where the coordinates are specified, as follows:

[bingmaps-map x&#61;51.503146 y&#61;-0.002979]

[bingmaps-map posn&#61;51.477841,-0.001548 zoom&#61;14 w&#61;800 h&#61;500 type&#61;ordnanceSurvey] (GB locale only)

= How do I pass the map coordinates in the URL? =

Shortcode Attributes can specify that a URL Parameter is to be used for the value, by enclosing the ID of the Parameter in braces. A typical shortcode where coordinates are passed in the URL is as follows:

[bingmaps-map posn&#61;{myposn} zoom&#61;{myzoom} w&#61;{mywidth} h&#61;{myheight} type&#61;{mytype}] 

The shortcode attributes above specify the ID of the URL parameter that will be used for the map coordinate etc. A typical URL for this shortcode would therefore be as follows:

[YourPageURL]?myposn=51.477841,-0.001548&myzoom=14&mytype=ordnanceSurvey

= How do I add pushpins to the map? =

The Shortcode Attributes 'pin1', 'pin2' etc. specify the position of pushpins. Alternatively the use 'pin={mypin}' to specify that the URL Parameters mypin1, mypin2 etc. are to be used for pushpin positions.

= What map types are available? =

All map types supported by the Bing Maps AJAX Control can be displayed. The map types available depends on the locale selected in the BingMaps settings.

The Bing Maps help page (http://msdn.microsoft.com/en-us/library/gg427625.aspx) lists all available map types.

== Screenshots ==

1. Settings Page
2. Typical output (Road Map)
3. Typical output (OS Map)

== Changelog ==

* Version History for BingMaps Plugin

= 0.3 =
* Shortcode attributes can be specified by URL Parameters
* 'x' and 'y' Shortcode Attributes replaced by a 'posn' Attribute
* Added pushpins

= 0.2 =
* Shortcode help corrected
* Added Plugin URI to header

= 0.1 =
* First public release

