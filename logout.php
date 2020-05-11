<?php
require 'theme/init.php';
session_start();
session_destroy();
redirect('login');
?>