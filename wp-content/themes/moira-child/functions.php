<?php
/**
 * Moira Child Theme Functions
 */

add_action( 'wp_enqueue_scripts', 'moira_child_enqueue_styles' );
function moira_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

// BLINDAJE DE SEGURIDAD: OCULTAR HUELLAS DE WORDPRESS
remove_action('wp_head', 'wp_generator');

// Se restringe el acceso a la REST API para usuarios no autenticados
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', 'Acceso restringido a Moira.', array( 'status' => 401 ) );
    }
    return $result;
});

// PROTECCIÓN DE CONTENIDO: REDIRECCIÓN DE SUSCRIPTORES
add_action( 'admin_init', 'moira_restrict_admin_access' );
function moira_restrict_admin_access() {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) return;
    
    if ( current_user_can( 'subscriber' ) ) {
        wp_safe_redirect( home_url('/mi-cuenta/') );
        exit;
    }
}

// PERSONALIZACIÓN DE MARCA: LOGO EN EL LOGIN
add_action( 'login_enqueue_scripts', 'moira_custom_login_logo' );
function moira_custom_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
            height: 100px;
            width: 300px;
            background-size: contain;
            background-repeat: no-repeat;
        }
        body.login { background-color: #F2EFDC; }
        .login #wp-submit { background: #B65835; border-color: #B65835; }
    </style>
<?php }

// DESACTIVAR XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );