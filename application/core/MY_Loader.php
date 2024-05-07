<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    public function __construct() {
        parent::__construct();
    }

    public function middleware($middleware) {
        include_once(APPPATH . 'middleware/' . $middleware . '.php');
        return new $middleware();
    }
}
