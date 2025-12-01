<?php
class Product {
    public $IDProduct;
    public $NameProduct;
    public $DescriptionProduct;
    public $IDCategory;
    public $PriceProduct;
    public $StockQuantityProduct;
    public $ImageUrlProduct;
    public $IsActiveProduct;

    public function __construct($IDProduct, $NameProduct, $DescriptionProduct, $IDCategory, $PriceProduct, $StockQuantityProduct, $ImageUrlProduct, $IsActiveProduct) {
        $this->IDProduct = $IDProduct;
        $this->NameProduct = $NameProduct;
        $this->DescriptionProduct = $DescriptionProduct;
        $this->IDCategory = $IDCategory;
        $this->PriceProduct = $PriceProduct;
        $this->StockQuantityProduct = $StockQuantityProduct;
        $this->ImageUrlProduct = $ImageUrlProduct;
        $this->IsActiveProduct = $IsActiveProduct;
    }
}
?>