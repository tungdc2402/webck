<?php
class shoppingCarts {
    public $IDShoppingCart;
    public $IDUser;
    public $CreatedAt;
    public $UpdateAt;
    public function __construct($IDShoppingCart, $IDUser, $CreatedAt, $UpdateAt) {
        $this->IDShoppingCart = $IDShoppingCart;
        $this->IDUser = $IDUser;
        $this->CreatedAt = $CreatedAt;
        $this->UpdateAt = $UpdateAt;
    }
}
?>
