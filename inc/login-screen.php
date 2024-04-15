<?php
/**
 * Login Logo
 *
 * @package      CoreFunctionality
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

    // Variable to get the images
    $image_url = plugin_dir_url( dirname( __FILE__ ) ) . '/img/user.svg';
    $image_bg = plugin_dir_url( dirname( __FILE__ ) ) . '/img/dots.png';
	
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
        height: 100svh;
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
    .login #login {
        position: relative;
        width: 360px;
        z-index: 9;
        padding: 0;
    }
    .login #login form {
        position: relative;
        border: none;
        border-radius: 2rem;
        box-shadow: 0px 1px 32px rgba(0,0,0,.24);
        padding: 4% 8% 8%;
        background-image: url(<?php echo $image_bg;?>);
        background-size: contain;
        background-repeat: no-repeat;
	    background-position: top center;
    }
    .login #login form::before {
        content:"";
        background-image: url(<?php echo $image_url;?>);
        background-size: contain;
        background-repeat: no-repeat;
	    background-position: center center;
        display: block;
        /* overflow: hidden; */
        width: 4rem;
        height: 4rem;
        margin-inline: auto;
        padding-block: 0 1rem;
    }
    .login #login .notice {
        box-shadow: 0px 1px 32px rgba(0,0,0,.24);
        border-radius: 16px;
    }
    .login #login h1 a, .login h1 a {
        background-image: none;
        display: block;
        overflow: hidden;
        text-indent: 0;
        width: 360px;
        height: 2rem;
        /* display: none; */
    }
    .login #login h1 a::before {
        content:"<?php echo get_bloginfo( 'name' ); ?>";
        font-weight: 600;
    }
    .login #login #nav, .login #login #backtoblog {
        text-align: center;
    }

    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'ea_login_logo', 44 );