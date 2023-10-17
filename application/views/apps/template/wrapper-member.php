<?php
require_once('header-member.php');
if (isset($popup)) {
	$this->load->view($popup);
}

if (isset($content)) {
	$this->load->view($content);
}

if (isset($botbar)) {
	$this->load->view($botbar);
}
require_once('footer-member.php');