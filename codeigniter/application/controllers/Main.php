<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends View_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    parent::view();
  }
}

?>