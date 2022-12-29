<?php
require_once('header-member.php');
if (isset($content)) {
	$this->load->view($content);
}
require_once('footer-member.php');