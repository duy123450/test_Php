<?php
function post($i, $v) {
    return isset($_POST[$i]) ? $_POST[$i] : $v;
}
function get($i, $v = 2) {
    return isset($_GET[$i]) ? $_GET[$i] : $v;
}
function req($i, $v = 2) {
    return isset($_REQUEST[$i]) ? $_REQUEST[$i] : $v;
}