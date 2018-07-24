<?php

/**
 * Class WP_EXT_ShortCode_CodeIcon
 */
class WP_EXT_ShortCode_CodeIcon extends WP_EXT_ShortCode {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		// Settings.
		$this->code_ID = 'icon';

		// Initialize.
		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_shortcode( $this->code_ID, [ $this, 'shortcode' ] );
	}

	/**
	 * ShortCode.
	 */
	public function shortcode( $atts, $content = null ) {

		/**
		 * Options.
		 */
		$defaults = [
			'type'     => '',
			'size'     => '',
			'rotate'   => '',
			'flip'     => '',
			'pull'     => '',
			'animated' => '',
			'class'    => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->code_ID );

		/**
		 * Rendering data.
		 */
		$classes = ( $atts['type'] ) ? $atts['type'] . '' : 'fas fa-star';
		$classes .= ( $atts['size'] ) ? ' fa-' . $atts['size'] . '' : '';
		$classes .= ( $atts['rotate'] ) ? ' fa-rotate-' . $atts['rotate'] . '' : '';
		$classes .= ( $atts['flip'] ) ? ' fa-flip-' . $atts['flip'] . '' : '';
		$classes .= ( $atts['pull'] ) ? ' fa-pull-' . $atts['pull'] . '' : '';
		$classes .= ( $atts['animated'] ) ? ' fa-spin' : '';
		$classes .= ( $atts['class'] ) ? ' ' . $atts['class'] : '';

		$out = '<span class="wp-ext-' . $this->domain_ID . ' wp-ext-' . $this->domain_ID . '-' . $this->code_ID . ' ' . esc_attr( $classes ) . '"></span>';

		return $out;
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_ShortCode_CodeIcon
 */
function WP_EXT_ShortCode_CodeIcon() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_ShortCode_CodeIcon;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_ShortCode_CodeIcon(), 'run' ] );
