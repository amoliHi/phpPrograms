<?php

/**
 * carCouponGenerator Interface to commit the classes that generate coupons:
 */
interface carCouponGenerator
{
  /**
   * Abstract function to add downturn discount
   */
  function addSeasonDiscount();
  /**
   * Abstract function to add stock discoutn
   */
  function addStockDiscount();
}
