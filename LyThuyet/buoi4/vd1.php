<pre>
    <?php
    print_r($_GET);
    $x1 = $_GET['a'] ?? '';
    $x2 = $_GET['b'] ?? '123456';
    echo "$x1 - $x2";