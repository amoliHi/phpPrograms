<?php

include "couponGenerator.php";

// Create object from the alternative classes.
function couponObjectGenerator($car)
{
  if ($car == "bmw") {
    $carObj = new bmwCouponGenerator;
  } else if ($car == "mercedes") {
    $carObj = new mercedesCouponGenerator;
  }

  return $carObj;
}

// Test the code.
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
