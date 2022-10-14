<?php
$area = 0;
$pack1 = 500;
$pack2 = 1000;
$pack3 = 5000;
$pack4 = 10000;
$registration = 0;

if ($area <= 50)
    {
        $registration = 1000;
    }
else if ($area <= 100)
    {
        $registration = 2000;
    }
else if($area <= 500)
    {
        $registration = 5000;
    }
else if($area <= 1000)
    {
        $registration = 20000;
    }
else if($area <= 5000)
    {
        $registration = 50000;
    }
else if ($area > 5000)
    {
        $registration = 75000;
    }

echo $registration;