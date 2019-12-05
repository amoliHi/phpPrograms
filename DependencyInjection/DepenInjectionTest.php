<?php
// require functions of Product class
include "Product.php";

//@var $stockItem hold the object reference to StockItem class
$stockItem=new StockItem(10,"Available");
//@var $product hold the object reference to Product class
$product=new Product(10124,$stockItem);
echo "Product Stock status:- \n";
//displaying product stock status
print_r($product->getStockItem());
echo "Product sku number:- \n";
print_r($product->getSku());
echo "\n";