<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation','session','upload','database','email');

$autoload['drivers'] = array();

$autoload['helper'] = array('url');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Authentication_model','Employee_model','Branch_model','Product_model');

