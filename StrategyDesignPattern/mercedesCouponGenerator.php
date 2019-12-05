<?php

//require abstract functions in carCouponGenerator file 
include_once "carCouponGenerator.php";

/**
 * mercedesCouponGenerator class implements the interface for Mercedes.
 */
class mercedesCouponGenerator implements carCouponGenerator
{
    //@var int $discount initialized with 0 as default value
    private $discount = 0;
    //@var false $isHighSeason initialized false as default
    private $isHighSeason = false;
    //@var true $bigStock initialized true as default
    private $bigStock = true;

    /**
     * Function to add Seasonal Discount
     *
     * @return [int] discount value
     */
    public function addSeasonDiscount()
    {
        if (!$this->isHighSeason) return $this->discount += 4;

        return $this->discount += 0;
    }

    /**
     * Function to add Stock Discount
     *
     * @return [int] discount value
     */
    public function addStockDiscount()
    {
        if ($this->bigStock) return $this->discount += 10;

        return $this->discount += 0;
    }
}
