<?php

//require functions in couponGenerator file 
include "couponGenerator.php";

/**
 * Function to create object from the alternative classes.
 *
 * @param [string] $car
 * @return $carObj object of either bmw or mercedes 
 * as per the parameter passed
 */
function couponObjectGenerator($car)
{
  if ($car == "bmw") {
    $carObj = new bmwCouponGenerator;
  } else if ($car == "mercedes") {
    $carObj = new mercedesCouponGenerator;
  }

  return $carObj;
}

//code testing logic
$car = "bmw";
$carObj = couponObjectGenerator($car);
$couponGenerator = new couponGenerator($carObj);
echo $couponGenerator->getCoupon();

echo "\n";

$car = "mercedes";
$carObj = couponObjectGenerator($car);
$couponGenerator = new couponGenerator($carObj);
echo $couponGenerator->getCoupon();
echo "\n";
