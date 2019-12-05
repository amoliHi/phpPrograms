<?php

/**
 * StockItem class have details of quantity and status of poduct
 */
class StockItem
{

  //@var int $quantity hold quantity of product
  private $quantity;
  //@var string $status hold status whether product is available or not 
  private $status;

  /**
   * Constructor function to initialize quantity and status of product
   *
   * @param integer $quantity
   * @param string $status
   * @return void
   */
  public function __construct(int $quantity, string $status)
  {
    $this->quantity = $quantity;
    $this->status   = $status;
  }

  /**
   * Function to get the quantity of product
   *
   * @return [int] $quantity of product
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * Function to get the status(availability) of product
   *
   * @return [string] $status of product
   */
  public function getStatus()
  {
    return $this->status;
  }
}
