<?php
class EP_Templates extends Edies_Plugin {
	protected $templates;

	public function __construct() {}

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

		$files = glob( PATH_TEMPLATES . '*.php' );
		foreach ( $files as $file ) {
			$this->templates = array_merge(
				array(
					basename( $file ) => basename( $file )
				),
				$this->templates
			);
		}
	}

	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

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
		$file = PATH_TEMPLATES . get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		if ( file_exists( $file ) ) {
			return $file;
		}

		return $template;
	}

	public function set_single_template( $template ) {
		switch ( get_post_type() ) {
			case 'ep-partners':
				$template = PATH_TEMPLATES . 'decreatievehoek-partner.php';
				break;
			case 'product' :
				$template = PATH_TEMPLATES . 'floorworld-product-template.php';
				break;
		}

    return $template;
	}

	public function set_archive_template( $template ) {
		// if ( is_tax( 'tax' ) ) {
    //   $template = PATH_TEMPLATES . 'ep-archive.php';
    // }
    return $template;
	}

	public function set_woocommerce_template_part( $template, $slug, $name ) {
		// look in plugin/woocommerce/slug-name.php or plugin/woocommerce/slug.php
    if ( $name ) {
        $path = PATH_TEMPLATES . WC()->template_path() . "{$slug}-{$name}.php";
    } else {
        $path = PATH_TEMPLATES . WC()->template_path() . "{$slug}.php";
    }
		// echo $path;
    return file_exists( $path ) ? $path : $template;
	}
}
