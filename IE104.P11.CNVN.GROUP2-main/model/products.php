<?php
class Product {
    public $IDProduct;
    public $NameProduct;
    public $DescriptionProduct;
    public $IDCategory;
    public $PriceProduct;
    public $StockQuantity;
    public $ImageUrlProduct;
    public $IsActiveProduct;

    public function __construct($IDProduct, $NameProduct, $DescriptionProduct, $IDCategory, $PriceProduct, $StockQuantity, $ImageUrlProduct, $IsActiveProduct) {
        $this->IDProduct = $IDProduct;
        $this->NameProduct = $NameProduct;
        $this->DescriptionProduct = $DescriptionProduct;
        $this->IDCategory = $IDCategory;
        $this->PriceProduct = $PriceProduct;
        $this->StockQuantity = $StockQuantity;
        $this->ImageUrlProduct = $ImageUrlProduct;
        $this->IsActiveProduct = $IsActiveProduct;
    }
}
?>