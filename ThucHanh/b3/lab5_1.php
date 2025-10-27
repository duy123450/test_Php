<?php
function isPrime($n)
{
    if ($n < 2)
        return false;
    if ($n == 2)
        return true;
    for ($i = 2; $i <= sqrt($n); $i++)
        if ($n % $i == 0)
            return false;
    return true;
}
function primeNums($n)
{
    $primes = [];
    $num = 2;
    while (count($primes) < $n) {
        if (isPrime($num))
            $primes[] = $num;
        $num++;
    }
    return $primes;
}

$primes = primeNums(10);
echo "10 snt dau tien: ";
echo implode(", ", $primes);
