<?php 
class Product
{
    public $ID;
    public $Category;
    public $Brand;
    public $Title;
    public $Quantity;
    public $Price;
    public $Description;
    public $Photo;
    public $Tags;

    function __construct( $ID, $Category, $Brand, $Title,$Quantity, $Price, $Description, $Photo, $Tags) {
		$this->ID = $ID;
        $this->Category = $Category;
        $this->Brand = $Brand;
        $this->Title = $Title;
        $this->Quantity = $Quantity;
        $this->Price = $Price;
        $this->Description = $Description;
        $this->Photo = $Photo;
        $this->Tags = $Tags;
    }
}

?>