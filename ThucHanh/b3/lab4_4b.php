<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lab 3_5</title>
    <style>
        #banco {
            border: solid;
            padding: 15px;
            background: #E8E8E8
        }

        #banco .cellBlack {
            width: 50px;
            height: 50px;
            background: black;
            float: left;
        }

        #banco .cellWhite {
            width: 50px;
            height: 50px;
            background: white;
            float: left
        }

        .clear {
            clear: both
        }
    </style>
</head>

<body>
    <?php
    function BCC($n, $color = "green")
    {
        $output = '';

        $output .= "<table bgcolor='$color'>";
        $output .= "<tr><td colspan='3'>Bảng cửu chương $n</td></tr>";

        for ($i = 1; $i <= 10; $i++)
            $output .= "<tr><td>$n</td><td>$i</td><td>" . ($n * $i) . "</td></tr>";

        $output .= "</table>";
        return $output;
    }

    function BanCo($size = 8)
    {
        $output = '';
        $output .= "<div id='banco'>";
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $classCss = (($i + $j) % 2) == 0 ? "cellWhite" : "cellBlack";
                $output .= "<div class='$classCss'> $i - $j</div>";
            }
            $output .= "<div class='clear'></div>";
        }
        $output .= "</div>";
        return $output;
    }

    function aggregateFunctions()
    {
        $functions = [
            ['Bcc', 6, "red"],
            ['BanCo', 8]
        ];
        $res = '';
        foreach($functions as $f){
            $function_name = $f[0];
            if(function_exists($function_name))
            $res .= call_user_func_array($function_name, array_slice($f, 1)) . "</br>";
        }
        return trim($res);
    }

    echo aggregateFunctions();
    ?>
</body>

</html>