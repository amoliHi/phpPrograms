<?php

include "Product.php";

$stockItem=new StockItem(10,"Available");
$product=new Product(10124,$stockItem);
echo "Product Stock status:- \n";
print_r($product->getStockItem());
echo "Product sku number:- \n";
print_r($product->getSku());
echo "\n";