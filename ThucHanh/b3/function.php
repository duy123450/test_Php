<?php
function BCC($n, $color = "green")
{
?>
    <table bgcolor="<?php echo $color; ?>">
        <tr>
            <td colspan="3">Bảng cửu chương <?php echo $n; ?></td>
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
        ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $i; ?></td>
                <td><?php echo $n * $i; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
function BanCo($size = 8)
{
?>
    <div id="banco">
        <?php
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $classCss = (($i + $j) % 2) == 0 ? "cellWhite" : "cellBlack";
                echo "<div class='$classCss'> $i - $j</div>";
            }
            echo "<div class='clear' />";
        }
        ?>
    </div>
<?php
}
function aggregateFunctions()
{
    $functions = [
        ['Bcc', 6, "red"],
        ['BanCo', 8]
    ];
    $res = '';
    foreach ($functions as $f) {
        $function_name = $f[0];
        if (function_exists($function_name))
            $res .= call_user_func_array($function_name, array_slice($f, 1)) . "</br>";
    }
    return trim($res);
}
