<?php

$sql_file_path = 'bookstore.sql';

if (!file_exists($sql_file_path)) {
    die("Error: SQL file not found at " . $sql_file_path);
}

$sql_content = file_get_contents($sql_file_path);
$sql_statements = explode(';', $sql_content);

echo "<h1>Extracted SQL Statements</h1>\n";

foreach ($sql_statements as $statement) {
    $trimmed_statement = trim($statement);

    if (!empty($trimmed_statement)) {
        echo "<p><strong>Statement:</strong></p>\n";
        echo "<pre style='background-color: #f4f4f4; padding: 10px; border: 1px solid #ddd;'>";
        echo htmlspecialchars($trimmed_statement);
        echo "</pre>\n";
        echo "<hr>\n";
    }
}
