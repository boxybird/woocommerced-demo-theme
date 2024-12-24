<?php

add_action( 'after_setup_theme', function () {
	add_theme_support( 'widgets' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'woocommerce-demo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'htmx', 'https://unpkg.com/htmx.org@2.0.4', [], '2.0.4', true );
	wp_enqueue_script( 'woocommerce-demo-script', get_template_directory_uri() . '/script.js', [], '0.1.0', true );
	wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], '3.x.x', true );
} );
