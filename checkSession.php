<?php
session_start();

if(isset($_SESSION['u']) || isset($_SESSION['a'])) {
    // Session exists
    echo "true";
} else {
    // No session
    echo "false";
}
?>
