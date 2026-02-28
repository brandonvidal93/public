<?php
/**
 * Moira Child Theme Functions
 */

// CARGA DE ESTILOS
add_action('wp_enqueue_scripts', 'moira_child_enqueue_styles');

function moira_child_enqueue_styles()
{
  // Tema padre
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Tema hijo
  wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'));
}

// RESTRICCIÓN DE ACCESO
add_action('template_redirect', 'moira_restrict_member_content');
function moira_restrict_member_content()
{
  $slug_exclusivo = 'miembros-exclusivos';
  if (is_page($slug_exclusivo) && !is_user_logged_in()) {
    wp_safe_redirect(home_url());
    exit;
  }
}

//PERSONALIZACIÓN DE MARCA: LOGO EN EL LOGIN
add_action('login_enqueue_scripts', 'moira_custom_login_logo');
function moira_custom_login_logo()
{ ?>
  <style type="text/css">
    #login h1 a,
    .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
      height: 100px;
      width: 300px;
      background-size: contain;
      background-repeat: no-repeat;
    }

    body.login {
      background-color: #F2EFDC;
    }

    .login #wp-submit {
      background: #B65835;
      border-color: #B65835;
    }
  </style>
<?php }

// DESACTIVAR XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// OCULTAR HUELLAS DE WORDPRESS
remove_action('wp_head', 'wp_generator');

add_filter('rest_authentication_errors', function ($result) {
  if (!empty($result)) {
    return $result;
  }
  if (!is_user_logged_in()) {
    return new WP_Error('rest_not_logged_in', 'Acceso restringido a Moira.', array('status' => 401));
  }
  return $result;
});

// OCULTAR ADMIN BAR A USUARIOS NO ADMIN
add_action('after_setup_theme', 'moira_hide_admin_bar');

function moira_hide_admin_bar()
{
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

// CAMBIO DE URL DEL LOGIN
add_action('init', 'moira_custom_login_slug');

function moira_custom_login_slug()
{
  // URL del login
  $secret_slug = 'entrada-prueba';
  $requested_uri = $_SERVER['REQUEST_URI'];

  if (strpos($requested_uri, 'wp-login.php') !== false && !isset($_GET['moira_access'])) {
    wp_safe_redirect(home_url());
    exit;
  }

  if (untrailingslashit($requested_uri) === home_url($secret_slug, 'relative')) {
    wp_safe_redirect(site_url('wp-login.php?moira_access=true'));
    exit;
  }
}

// ENCOLAR SCRIPTS
add_action('wp_enqueue_scripts', 'moira_custom_js_scripts');

function moira_custom_js_scripts()
{
  wp_enqueue_script(
    'moira-optimization-script',
    get_stylesheet_directory_uri() . '/js/moira-scripts.js',
    array(),
    '1.0.0',
    true
  );
}

// 404 REDIRECCION PERSONALIZADA
add_action('template_redirect', 'moira_redirect_404_to_home');
function moira_redirect_404_to_home()
{
  if (is_404()) {
    wp_safe_redirect(home_url(), 301); // Redirección permanente
    exit;
  }
}