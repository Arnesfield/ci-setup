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
class View_Controller extends MY_Controller {
  
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
   * @param string $view Name of the page or view
   * @param array $data Data to be passed in the $view
   * @param string $dir Directory of the $view under views/
   * @param boolean $page_only Loads the $view only; otherwise, header and footer in views/templates/ are also loaded
   * @return void
   */
  protected function view($view = 'home', $data = NULL, $dir = 'pages', $page_only = FALSE) {
    // check if page exists
    if (!file_exists(APPPATH . 'views/' . $dir . '/' . $view . '.php')) {
      show_404();
    }

    // if data is null
    if ($data === NULL) {
      $data['title'] = ucfirst($view);
    }

    if ($page_only === TRUE) {
      $this->load->view($dir . '/' . $view, $data);
    }
    else {
      $this->load->view('templates/header', $data);
      $this->load->view($dir . '/' . $view);
      $this->load->view('templates/footer');
    }

  }
}

?>