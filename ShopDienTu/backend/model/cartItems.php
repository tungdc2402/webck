<?php
class cartItems {
    public $IDCartItem;
    public $IDShoppingCart;
    public $IDProduct;
    public $QuantityCartItem;
    public $CreatedAt;
    public function __construct($IDCartItem, $IDShoppingCart, $IDProduct, $QuantityCartItem, $CreatedAt) {
        $this->IDCartItem = $IDCartItem;
        $this->IDShoppingCart = $IDShoppingCart;
        $this->IDProduct = $IDProduct;
        $this->QuantityCartItem = $QuantityCartItem;
        $this->CreatedAt = $CreatedAt;
    }
}
?>
