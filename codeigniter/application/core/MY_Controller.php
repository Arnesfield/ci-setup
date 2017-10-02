<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }
}

/**
 * View Controller
 * 
 * Extend to this controller to load views.
 */
class MY_View_Controller extends MY_Controller {
  
  /**
   * Loads URL helper.
   */
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
  }

  /**
   * Checks if $view exists and Loads it.
   *
   * @param string $view The name of the view to be loaded
   * @param array $data An associative array to be passed in the $view
   * @return void
   */
  private function _load_view($view, $data = array()) {
    // check if page exists
    if (!file_exists(APPPATH . 'views/' . $view . '.php')) {
      show_404();
    }
    // load view
    $this->load->view($view, $data);
  }

  /**
   * Loads a view in the views/ directory.
   *
   * @param mixed $view Name of the view or an array of names of the views in views/ to be loaded
   * @param array $data An associative array to be passed in the $view
   * @param boolean $page_only Loads the $view only; otherwise, header and footer in views/templates/ are also loaded
   * @return void
   */
  protected function _view($view = 'pages/home', $data = array(), $page_only = FALSE) {

    // load header
    if (!$page_only) {
      // set title if data is null or empty
      if (empty($data) && !is_array($view)) {
        $data['title'] = ucfirst(basename($view));
      }

      // load header
      $this->_load_view('templates/header', $data);
    }

    // turn $view into array
    if (!is_array($view)) {
      $view = array($view);
    }
    // load views
    foreach ($view as $v) {
      $this->_load_view($v, $data);
    }

    // load footer
    if (!$page_only) {
      $this->_load_view('templates/footer');
    }

  }
}

?>