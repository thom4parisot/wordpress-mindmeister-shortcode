=== Mindmeister Shortcode ===
Contributors: oncletom
Tags: mindmeister, mindmap, shortcode
Requires at least: 2.0
Tested up to: 3.1
#Stable tag: 1.0

Mindmeister Shortcode enables the embeding of online mindmap in your post content.


== Description ==

This plugin provides an easy way to embed Mindmeister plugins within your posts, page or whatever custom types you use.

It is pretty straightforward, with both lazy and complete way.

= Usage =
Copy and paste any URL for the `[mindmeister url="MINDMAP_URL"]` shortcode.

Currently works with these mindmap URLs (the `MINDMAP_URL` string above):

* Private URL (http://www.mindmeister.com/ID/SLUG)
* Public URL (http://www.mindmeister.com/maps/show/ID)
* Embed URL (http://www.mindmeister.com/maps/public_map_shell/ID, http://www.mindmeister.com/maps/public_map_shell/ID/SLUG)

Alternatively, you can use only the ID if you feel comfortable enough with this syntax:

* `[mindmeister id="ID"]`
* `[mindmeister]ID[/mindmeister]`

= Arguments =

They work at any time:

* `id`: ID of the Mindmeister mindmap
* `url`: URL of the Mindmeister mindmap
* `height`: desired height of the displayed mindmap (numeric, in pixel)
* `width`: desired width of the displayed mindmap (numeric, in pixel)
* `zoom`: desired zoom of the displayed mindmap (numeric, between 0 and 10)

You need at least either of `url` or `id` arguments to procude a working shortcode.  
If `WP_DEBUG` is enabled, error message will be traced through `WP_Error`.

= Todo-list =

* Parse the URL to automatically detect width, zoom and height
* Provide admin settings to customize default width, zoom and height
* Provide admin settings to filter the display upon post format and feeds
* Provide filters for attributes and outputing


== Installation ==

Install your plugin as usual. Once installed, it's ready to use (please see the plugin description section for that).


== Frequently Asked Questions ==

Any question? [Drop me a line](http://wordpress.org/tags/mindmeister-shortcode?forum_id=10#postform).


== Changelog ==

= 1.0 =

* Initial version
* Displays a shortcode within an iframe