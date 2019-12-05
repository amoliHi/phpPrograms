<?php

//require functions in bmwCouponGenerator file 
include "bmwCouponGenerator.php";
//require functions in mercedesCouponGenerator file 
include "mercedesCouponGenerator.php";

// The client class generates coupon from the object of choice.
class couponGenerator
{
  private $carCoupon;

  // Get only objects that belong to the interface.  
  public function __construct(carCouponGenerator $carCoupon)
  {
    $this->carCoupon = $carCoupon;
  }

  // Use the object's methods to generate the coupon. 
  public function getCoupon()
  {
    $discount = $this->carCoupon->addSeasonDiscount();
    $discount = $this->carCoupon->addStockDiscount();

    return $coupon = "Get {$discount}% off the price of your new car.";
  }
}

