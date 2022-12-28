<?php
require_once('header-member.php');
if (isset($topbar)) {
	$this->load->view($topbar);
}
if (isset($content)) {
	$this->load->view($content);
}
if (isset($botbar)) {
	$this->load->view($botbar);
}
if (isset($popup)) {
	$this->load->view($popup);
}
require_once('footer-member.php');