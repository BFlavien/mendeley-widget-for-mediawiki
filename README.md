Mendeley Widget for MediaWiki
=============================

*Let you embed the Mendeley group widget in your wiki*

Installation
============

 1. Download and extract the files in a directory called "MendeleyWidget" in your extensions/ folder.
 2. Add the following code to your LocalSettings.php (at the bottom)

  `require_once( "$IP/extensions/MendeleyWidget/MendeleyWidget.php" );`

 3. Navigate to Special:Version on your wiki to verify that the extension is successfully installed.

Configuration parameters
========================

Just insert the `<mendeleywidget option1="value1" option2="value2" .../>` tag where you want the widget to appear.

You can configure it as an iframe (it is iframe-based).

 - src (no default values) : URI of the Mendeley group
 - width  (default "260px") : The width of the widget
 - height (default "550px") : The height of the widget
 - scrolling (default "auto") : ["auto" / "yes" / "no"] for enabling / disabling the scrolling.
 - frameborder (default "0") : ["1" / "0"] for enabling / disabling the frameborder
 - ribbon (default "false") : ["true" / "false"] for enabling /disabling the ribbon
 - picture (default "false") : ["true" / "false"] for enabling /disabling the group picture
 - owner (default "false") : ["true" / "false"] for enabling /disabling the owner of the groups
 - groupdesc (default "false") : ["true" / "false"] for enabling /disabling the group description
 - heading (default "false") : ["true" / "false"] for enabling /disabling the heading
 - n_papers (default "10") : The number of recent papers to show

Default values
--------------

    <mendeleywidget src="uri_of_the_src" width="260px" height="550px" scrolling="auto" frameborder="0" n_papers="10" />

Troubleshooting
===============

Mendeley widget is an extremely simple extension; all it does is convert an "mendeleywidget" tag into an `<iframe></iframe>` tag and generate the embedding code and let you customize the widget as you can on the Mendeley application.

There is default values to prevent errors from the users.

Wiki Compatibility
==================

Mendeley Widget uses ResourceLoader, which was introduced in MW 1.17. I only have access to a wiki running 1.19.2, so I cannot guarantee that Mendeley widget will work on earlier versions of MediaWiki.

Change Log
==========

v0.1:
*Initial version

To Do
=====


----------


Please email comments, questions, or bug reports to bossiaux.flavien at gmail.org.