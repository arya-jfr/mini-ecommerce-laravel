<?php

if (!function_exists('calcpercent')){
    function calcpercent(int|float $totalPrice, int|float $discountAmount): int
    {
        return $discountAmount / $totalPrice * 100;
    }
}
