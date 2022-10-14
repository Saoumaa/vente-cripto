<?php
$quantity = 100000;
$sold = 448;
$remaining = $quantity - $sold;
$price = 0;
$value = $sold * 10;

if ($sold <= 1000) 
    {
        $price= 150;
    }
else if($sold < 10000) 
    {
        $price = 1000;
    }
else if($sold < 20000) 
    {
        $price = 2000;
    }
else if($sold < 30000)
    {
        $price = 3000;
    }
else if($sold < 40000) 
    {
        $price = 4000;
    }
else if ($sold < 50000)
    {
        $price = 5000;
    }
else if ($sold < 100000)
    {
        $price = 10000;
    }

echo $price;