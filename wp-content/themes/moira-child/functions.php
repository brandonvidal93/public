<?php
/**
 * Moira Child Theme Functions
 */

// 1. CARGA DE ESTILOS (Corregido)
add_action( 'wp_enqueue_scripts', 'moira_child_enqueue_styles' ); // El nombre aquí...

function moira_child_enqueue_styles() { // ...debe ser IGUAL al de aquí.
    // Carga el estilo del tema padre
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
    // Carga el estilo del tema hijo
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

// 2. RESTRICCIÓN DE ACCESO (Lo que añadimos anteriormente)
add_action( 'template_redirect', 'moira_restrict_member_content' );
function moira_restrict_member_content() {
    $slug_exclusivo = 'miembros-exclusivos';
    if ( is_page( $slug_exclusivo ) && ! is_user_logged_in() ) {
        wp_safe_redirect( home_url() );
        exit;
    }
}