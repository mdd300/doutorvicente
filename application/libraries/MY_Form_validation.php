<?php

class MY_Form_validation extends CI_Form_validation
{
    public function __construct()
    {
        parent::__construct();
    }

    public function error_array()
    {
        return $this->_error_array;
    }

}