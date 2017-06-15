<?php
/**
 * Created by PhpStorm.
 * User: Silas
 * Date: 15.05.2017
 * Time: 23:15
 */
session_start();
unset($_SESSION['userId']);
header('Location: login');