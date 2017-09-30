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
   * Loads a page in the views/ directory.
   *
   * @param string $view Name of the page or view in views/
   * @param array $data An associative array to be passed in the $view
   * @param boolean $page_only Loads the $view only; otherwise, header and footer in views/templates/ are also loaded
   * @return void
   */
  protected function _view($view = 'pages/home', array $data = NULL, $page_only = FALSE) {
    // check if page exists
    if (!file_exists(APPPATH . 'views/' . $view . '.php')) {
      show_404();
    }

    // set title if data is null or empty
    if ($data === NULL || empty($data)) {
      $data['title'] = ucfirst(basename($view));
    }

    // load page
    if ($page_only === TRUE) {
      $this->load->view($view, $data);
    }
    else {
      $this->load->view('templates/header', $data);
      $this->load->view($view);
      $this->load->view('templates/footer');
    }

  }
}

?>