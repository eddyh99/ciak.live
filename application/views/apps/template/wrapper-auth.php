<?php
require_once('header-auth.php');
if (isset($content)) {
	$this->load->view($content);
}
require_once('footer-auth.php');