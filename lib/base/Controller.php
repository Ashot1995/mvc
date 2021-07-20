<?php

/**
 * Class Controller
 */
class Controller
{
	// defines the view
	public $view = null;
	// defines the request
	protected $_request = null;
	// the current action
	protected $_action = null;
	
	protected $_namedParameters = array();

	/**
	 * initializes various things in the controller
	 */
	public function init()
	{
		$this->view = new View();
		
		$this->view->settings->action = $this->_action;
		$this->view->settings->controller = strtolower(str_replace('Controller', '', get_class($this)));
	}

	/**
	 * These filters are run BEFORE the action is run
	 */
	public function beforeFilters()
	{
		// no standard filers
	}
	
	/**
	 * These filters are run AFTER the action is run
	 */
	public function afterFilters()
	{
		// no standard filers
	}

    /**
     * @param string $action
     */
	public function execute($action = 'index')
	{
		// stores the current action
		$this->_action = $action;
		
		// initializes the controller
		$this->init();
		
		// executes the before filters
		$this->beforeFilters();
		
		// adds the action suffix to the function to call
		$actionToCall = $action.'Action';
		
		// executes the action
		$this->$actionToCall();
		
		// executes the after filterss
		$this->afterFilters();
		
		// renders the view
		$this->view->render($this->_getViewScript($action));
	}

    /**
     * @param $action
     * @return string
     */
	protected function _getViewScript($action)
	{
		// fetches the current controller executed
		$controller = get_class($this);
		// removes the "Controller" part and adds the action name to the path
		$script = strtolower(substr($controller, 0, -10) . '/' . $action . '.php');
		// returns the script to render
		return $script;
	}

    /**
     * @return false|string
     */
	protected function _baseUrl()
	{
		return WEB_ROOT;
	}

    /**
     * @return Request
     */
	public function getRequest()
	{
		// initializes the request object
		if ($this->_request == null) {
			$this->_request = new Request();
		}
		
		return $this->_request;
	}

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
	protected function _getParam($key, $default = null)
	{
		// tests against the named parameters first
		if (isset($this->_namedParameters[$key])) {
			return $this->_namedParameters[$key];
		}
		
		// tests against the GET/POST parameters
		return $this->getRequest()->getParam($key, $default);
	}

    /**
     * @return array
     */
	protected function _getAllParams()
	{
		return array_merge($this->getRequest()->getAllParams(), $this->_namedParameters);
	}

    /**
     * @param $key
     * @param $value
     */
	public function addNamedParameter($key, $value)
	{
		$this->_namedParameters[$key] = $value;
	}
}
