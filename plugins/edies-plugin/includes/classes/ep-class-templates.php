<?php
class EP_Templates extends Edies_Plugin {
	protected $templates;

	public function __construct() {

	}

	public function add_templates() {
		$this->templates = array();

		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);
		} else {

			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);
		}

		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_project_templates' )
		);

		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);

		$this->templates = array(
			'madog-home-template.php' => 'MADOG Homepage',
		);
	}
	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}
	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );


		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		wp_cache_delete( $cache_key , 'themes');


		$templates = array_merge( $templates, $this->templates );


		wp_cache_add( $cache_key, $templates, 'themes', 1800 );
		return $atts;
	}
	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {

		global $post;

		if ( ! $post ) {
			return $template;
		}

		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}
		$file = DIR_TEMPLATES . get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file . '<br>';
			echo '<br>' . 'plugins/edies-plugin/includes/templates/madog-home-template.php';
		}

		return $template;
	}

	public function set_single_template( $template ) {
		if ( get_post_type() == 'ep-kraam' OR get_post_type() == 'ep-winkel' ) {
      $template = 'ep-vendor-template.php';
			$template = DIR_TEMPLATES . $template;
    }
    return $template;
	}
	public function set_archive_template( $template ) {
		if ( is_tax( 'winkel-cat' ) OR is_tax( 'kraam-cat' ) ) {
      $template = 'ep-category-template.php';
			$template = DIR_TEMPLATES . $template;
    }
    return $template;
	}

}
