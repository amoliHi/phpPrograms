<?php

//require functions in bmwCouponGenerator file 
include "bmwCouponGenerator.php";
//require functions in mercedesCouponGenerator file 
include "mercedesCouponGenerator.php";

/**
 * couponGenerator class to generates coupon from the object of choice.
 */
class couponGenerator
{
    //@var $carCoupon
    private $carCoupon;

    /**
     * Constructor to initialize couponGenerator class object
     * Get only objects that belong to the interface.
     *
     * @param carCouponGenerator $carCoupon
     */
    public function __construct(carCouponGenerator $carCoupon)
    {
        $this->carCoupon = $carCoupon;
    }

    /**
     * Function will use the object's methods to generate the coupon.
     *
     * @return [string] $coupon
     */
    public function getCoupon()
    {
        $discount = $this->carCoupon->addSeasonDiscount();
        $discount = $this->carCoupon->addStockDiscount();

        return $coupon = "Get {$discount}% off the price of your new car.";
    }
}
