<?php

function signal_scripts() {
/**
 * styles
 */
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/compiled/style.css', array(), '1.0.0', 'all' );
	
	// enqueue google fonts
	wp_enqueue_style( 'signal-fonts', 'https://fonts.googleapis.com/css?family=Montserrat|Roboto+Slab&display=swap' );

	// cookie consent styles provided by https://www.osano.com/cookieconsent/download/
	wp_enqueue_style( 'cookies-styles', 'https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css' );

/**
 * scripts
 */
	wp_enqueue_script( 'footer-scripts', get_template_directory_uri() . '/assets/compiled/footer.js', array('jquery'), '1.0.0', true );
	
	// cookie consent scripts provided by https://www.osano.com/cookieconsent/download/
	wp_enqueue_script( 'cookies-scripts', 'https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js' );
	

	// only load comments script if needed
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'signal_scripts' );


/**
 * 
 * Enqueue stuff for the editor only, not the frontend
 * 
 */

// my own global block editor styles
function signal_block_editor_styles() {
  wp_enqueue_style( 'signal-editor-style', get_stylesheet_directory_uri() . '/assets/compiled/editor-style.css', array(), '1.0.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'signal_block_editor_styles' );


// extending Gutenberg blocks with more styling options
// function signal_gutenberg_scripts() {

// 	wp_enqueue_script(
// 		'signal-gb-block-options', 
// 		get_stylesheet_directory_uri() . '/assets/compiled/editor-scripts.js', 
// 		array( 'wp-blocks', 'wp-dom' ), 
// 		filemtime( get_stylesheet_directory() . '/assets/compiled/editor-scripts.js' ),
// 		true
// 	);
// }
// add_action( 'enqueue_block_editor_assets', 'signal_gutenberg_scripts' );