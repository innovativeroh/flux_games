<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "flux_games";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;