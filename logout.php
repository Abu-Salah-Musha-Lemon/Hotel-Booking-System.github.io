<?php

include_once './admin/inc/config.php';
include_once './admin/inc/essential.php';

session_start();
session_unset();
session_destroy();
redirect('index.php');
