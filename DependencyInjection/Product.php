<?php 
 include "StockItem.php";

 class Product {
   private $stockItem;
   private $sku;
   
   public function __construct($sku, StockItem $stockItem){
     $this->stockItem  = $stockItem;
     $this->sku = $sku;
   }
   
   public function getStockItem(){
     return $this->stockItem;
   }
   
   public function getSku(){
     return $this->sku;
   }
 }