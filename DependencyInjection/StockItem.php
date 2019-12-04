<?php 
 
class StockItem {
  
  private $quantity;
  private $status;
  
  public function __construct(int $quantity,string $status){
   $this->quantity = $quantity;
   $this->status   = $status;
  }
  
  public function getQuantity(){
   return $this->quantity;
  }
  
  public function getStatus(){
   return $this->status;
  }
  
}