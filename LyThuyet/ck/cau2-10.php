<?php
// ket noi mariadb bookstore vs username = root & pass = 123
$pdo = new PDO("mariadb:host=localhost;dbname=bookstore", "root", "123");