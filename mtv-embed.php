<?php
/*
Plugin Name: MTV-Embed
Description: Adds a shorttag for embedding MTV videos. Use it like this: [mtv width=512 height=319]video-id[/mtv], where width and height are optional parameters.
Author: Ondřej Bakan
Version: 1.1
Author URI: http://ondrej.bakan.cz
Plugin URI: http://wordpress.org/extend/plugins/mtv-embed-plugin/
*/

###### [B] HOOKS ######

// Activation
register_activation_hook( __FILE__, 'mtv_embed_activate' );

// Deactivation
register_deactivation_hook( __FILE__, 'mtv_embed_deactivate' );

// Create shortcode
add_shortcode('mtv', 'mtv_shortcode');
###### [E] HOOKS ######

###### [B] MISC. ######

### Install
// Create default settings
function mtv_embed_activate()  {
  // Put default values
  add_option( 'mtv_embed_width', '512', '', 'yes' );
  add_option( 'mtv_embed_height', '319', '', 'yes' );
  // Ping me
  @file_get_contents("http://plugin.bakan.cz/mtv-embed.php?action=activate&siteurl=" . get_option('siteurl'));
  }
  
### Uninstall
// Delete database rows we've created
function mtv_embed_deactivate()  {
  // Unregister our settings
  unregister_setting( 'mtv_embed-settings-group', 'mtv_embed_width', $sanitize_callback = '' );
  unregister_setting( 'mtv_embed-settings-group', 'mtv_embed_height', $sanitize_callback = '' );
  // Delete them from database
  delete_option( 'mtv_embed_width' );
  delete_option ( 'mtv_embed_height' );
  // Ping me
  @file_get_contents("http://plugin.bakan.cz/mtv-embed.php?action=deactivate&siteurl=" . get_option('siteurl'));
  }

###### [E] MISC. ######

###### [B] CORE ######

// Create shortcode function
function mtv_shortcode( $atts, $content = null )  {
  extract( shortcode_atts( array(
    'width'   =>  get_option( 'mtv_embed_width' ),
    'height'  =>  get_option( 'mtv_embed_height' ),
  ), $atts ) );
  
  return '<embed src="http://media.mtvnservices.com/mgid:uma:video:mtv.com:' . $content . '" width="' . esc_attr($width) . '" height="' . esc_attr($height) . '" type="application/x-shockwave-flash" flashVars="configParams=vid%3D' . $content . '%26uri%3Dmgid%3Auma%3Avideo%3Amtv.com%3A' . $content . '" allowFullScreen="true" allowScriptAccess="always" base="."></embed>';
}

###### [E] CORE ######

###### [B] SETTINGS ######

// Create custom plugin settings menu
add_action( 'admin_menu', 'mtv_embed_create_menu' );

function mtv_embed_create_menu() {

	// Create new sub-menu page
	add_submenu_page( 'plugins.php', __('MTV Embed settings'), __('MTV Embed Settings'), 'administrator', __FILE__, 'mtv_embed_settings_page' );

	// Call register settings function
	add_action( 'admin_init', 'register_mtv_embed_settings' );
}


function register_mtv_embed_settings() {
	// Register our settings
	register_setting( 'mtv_embed-settings-group', 'mtv_embed_width' );
	register_setting( 'mtv_embed-settings-group', 'mtv_embed_height' );
}

function mtv_embed_settings_page() {
?>
<div class="wrap">
<h2>MTV Embed</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'mtv_embed-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Default player width</th>
        <td><input type="text" name="mtv_embed_width" value="<?php echo get_option( 'mtv_embed_width' ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Default player height</th>
        <td><input type="text" name="mtv_embed_height" value="<?php echo get_option( 'mtv_embed_height' ); ?>" /></td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>" />
    </p>

</form>
</div>
<?php } ?>