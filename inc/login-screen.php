<?php
/**
 * Login Logo
 *
 * @package      Marbella Design School 
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Login Logo URL
 *
 */
function ea_login_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'ea_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );

/**
 * Login Logo
 *
 */
function ea_login_logo() {

    // Variable to get the image from the plugin's folder
    // $fallback_logo = plugin_dir_url( dirname( __FILE__ ) ) . '/img/logo.svg';
	$logo_path = '/wp-content/uploads/logo.svg';
	
    ?>
    <style type="text/css">
    body.login {
        display: grid;
        place-items: center;
        background: hsl(212, 100%, 91%);
        background-image: linear-gradient(
            180deg,
            hsl(212, 100%, 92%) 11%,
            hsl(212, 66%, 82%) 100%
        );
        height: 100vh;
        overflow: hidden;
    }
    body.login::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        background-color: hsla(240, 3%, 94%, 1);
        width: 200%;
        height: 200%;
        transform: rotate(16deg) translateX(-95%) translateY(-15%);
        z-index: 0;
        -webkit-box-shadow: 5px 0px 0px 8px rgba(240, 240, 241, 0.5);
        box-shadow: 5px 0px 0px 8px rgba(240, 240, 241, 0.5);
    }
    @media (min-width:400px) {
        body.login::before {
            transform: rotate(16deg) translateX(-90%) translateY(-15%);
        }
    }
    @media (min-width:660px) {
        body.login::before {
            transform: rotate(16deg) translateX(-80%) translateY(-15%);
        }
    }
    #login {
        position: relative;
        z-index: 9;
    }
    .login form {
        border: none;
        border-radius: 10px;
    }
    .login .message, .login .success, .login form {
        box-shadow: 0px 1px 8px rgba(0,0,0,.15);
    }
    #login h1 a, .login h1 a {
        background-image: url(<?php echo $logo_path;?>);
        background-size: contain;
        background-repeat: no-repeat;
	    background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 312px;
        height: 100px;
    }
    
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'ea_login_logo', 44 );