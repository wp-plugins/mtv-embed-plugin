=== Plugin Name ===
Contributors: BaconCZE
Tags: video, embed, mtv
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.0

This plugin adds a shorttag for embedding MTV videos. No configuration available, nor required. 

== Description ==

This plugin adds a shorttag for embedding MTV videos. No configuration available, nor required.

Use it like this: [mtv width=512 height=319]video-id[/mtv], where width and height are optional parameters. Default values are hardcoded in PHP file, you can edit them even without knowledge of PHP.

Variable video-id can be found in the URL, for example: http://www.mtv.com/videos/misc/516528/my-first-kiss-live.jhtml. That 516258 is video-id, which is needed to paste between [mtv] and [/mtv].   

== Installation ==

1. Extract the contents of the archive (zip file)
2. Upload the mtv-embed folder to your 'wp-content/plugins' folder
3. Activate the plugin through the Plugins section in your WordPress admin
4. Use the [mtv][/mtv] shortcode as described above

== Frequently Asked Questions ==

= Will you provide more useful embed shorttags? =

Probably not. There is too much plugins, which do their jobs really well. I just missed some with MTV videos included, so I did it myself.

== Changelog ==

= 1.0 =
* Initial release, so there are not changes.

== Upgrade Notice ==

= 1.0 =
Initial release, so there is not upgrade notice.