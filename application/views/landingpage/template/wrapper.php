<?php
require_once('header.php');
if (isset($content)) {
    $this->load->view($content);
}
require_once('footer.php');