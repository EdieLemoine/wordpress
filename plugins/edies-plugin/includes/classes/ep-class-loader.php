<?php

class EP_Loader {
	protected $actions;
	protected $filters;
	protected $remove_actions;
	protected $remove_filters;

	public function __construct() {
		$this->filters = array();
		$this->actions = array();
		$this->remove_filters = array();
		$this->remove_actions = array();
	}

	public function add_filter( $tag, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $tag, $component, $callback, $priority, $accepted_args );
	}

  public function add_action( $tag, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $tag, $component, $callback, $priority, $accepted_args );
	}

	public function remove_filter( $tag, $callback, $priority = 10 ) {
		$this->remove_filters = $this->remove( $this->remove_filters, $tag, $callback, $priority );
	}

	public function remove_action( $tag, $callback, $priority = 10 ) {
		$this->remove_actions = $this->remove( $this->remove_actions, $tag, $callback, $priority );
	}

	private function add( $hooks, $tag, $component, $callback, $priority, $accepted_args ) {
		$hooks[] = array(
			'tag' => $tag,
			'component' => $component,
			'callback' => $callback,
			'priority' => $priority,
			'accepted_args' => $accepted_args
		);
		return $hooks;
	}

	private function remove( $hooks, $tag, $callback, $priority ) {
		$hooks[] = array(
			'tag' => $tag,
			'callback' => $callback,
			'priority' => $priority
		);
		return $hooks;
	}

  public function run() {
		foreach ( $this->filters as $hook ) {
			add_filter( $hook['tag'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		foreach ( $this->actions as $hook ) {
			add_action( $hook['tag'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}
		foreach ( $this->remove_filters as $hook ) {
			remove_filter( $hook['tag'], $hook['callback'], $hook['priority'] );
		}
		foreach ( $this->remove_actions as $hook ) {
			remove_action( $hook['tag'], $hook['callback'], $hook['priority'] );
		}
	}
}
 ?>
