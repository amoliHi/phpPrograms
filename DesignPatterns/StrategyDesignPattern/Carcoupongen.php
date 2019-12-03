<?php

// interface to commit the classes that generate coupons:
// 1. to add downturn discount
// 2. to add stock discount
interface carCouponGenerator {
    function addSeasonDiscount();
    function addStockDiscount();
  }