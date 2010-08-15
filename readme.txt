=== MTV Embed ===
Contributors: BaconCZE
Tags: embed, embedding, mtv, video, shorttag
Requires at least: 2.7
Tested up to: 3.0.1
Stable tag: trunk

This plugin adds a shorttag for embedding MTV videos.

== Description ==

This plugin adds a shorttag for embedding MTV videos.

Use it like this: [mtv width=512 height=319]video-id[/mtv], where width and height are optional parameters. If you do not specify them, the values set in settings page are used. 

Variable video-id can be found in the URL, for example: http://www.mtv.com/videos/misc/516528/my-first-kiss-live.jhtml. That 516258 is video-id, which is needed to paste between [mtv] and [/mtv].   

== Installation ==

1. Extract the contents of the archive (zip file)
2. Upload the mtv-embed folder to your 'wp-content/plugins' folder
3. Activate the plugin through the Plugins section in your WordPress admin
4. You can set your own default dimensions by setting them up on the settings page 
5. Use the [mtv][/mtv] shortcode as described above

== Frequently Asked Questions ==

= Will you provide more useful embed shorttags? =

Probably not. There is too much plugins, which do their jobs really well. I just missed some with MTV videos included, so I did it myself.

== Changelog ==

= 1.1 =
* Added settings page
* Misc. changes in code due to adding settings page

= 1.0 =
* Initial release, so there are not changes

== Upgrade Notice ==

= 1.1 =
You can now set default dimensions in settings page.

= 1.0 =
Initial release, so there is not upgrade notice.