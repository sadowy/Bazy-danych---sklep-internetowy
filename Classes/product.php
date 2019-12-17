<?php 
class Product
{
    public $ID;
    public $Category;
    public $Brand;
    public $Title;
    public $Price;
    public $Description;
    public $Photo;
    public $Tags;

    function __construct( $ID, $Category, $Brand, $Title, $Price, $Description, $Photo, $Tags) {
		$this->ID = $ID;
        $this->Category = $Category;
        $this->Brand = $Brand;
        $this->Title = $Title;
        $this->Price = $Price;
        $this->Description = $Description;
        $this->Photo = $Photo;
        $this->Tags = $Tags;
    }
}

?>