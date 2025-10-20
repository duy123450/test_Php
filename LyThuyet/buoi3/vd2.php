<?php
$m1 = [1, 3, 6];
$tong = 0;
for ($i = 0; $i < count($m1); $i++)
    if ($m1[$i] % 2 == 0)
        $tong += $m1[$i];
echo "<hr>Tong chan = $tong";
$tong = 0;
foreach ($m1 as $chiso => $gtri)
    if ($gtri % 2)
        $tong += $gtri + $chiso;
echo "<hr>Tong 2 = $tong";