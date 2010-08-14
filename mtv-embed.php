<?php
/*
Plugin Name: MTV-Embed
Description: Adds a shorttag for embedding MTV videos. Use it like this: [mtv width=512 height=319]video-id[/mtv], where width and height are optional parameters. Default values are hardcoded (512, 319), you can edit them even without knowledge of PHP.
Author: Ondřej Bakan
Version: 1.0
Author URI: http://ondrej.bakan.cz
Plugin URI:
*/

// Create shortcode function
function mtv_shortcode($atts, $content = null)  {
  extract(shortcode_atts(array(
    'width'   =>  '512',
    'height'  =>  '319',
  ), $atts));
  
  return '<embed src="http://media.mtvnservices.com/mgid:uma:video:mtv.com:' . $content . '" width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" type="application/x-shockwave-flash" flashVars="configParams=vid%3D' . $content . '%26uri%3Dmgid%3Auma%3Avideo%3Amtv.com%3A' . $content . '" allowFullScreen="true" allowScriptAccess="always" base="."></embed>';
}

// Create shortcode
add_shortcode('mtv', 'mtv_shortcode');
?>