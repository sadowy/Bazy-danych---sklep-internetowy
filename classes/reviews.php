<?php 
class Product
{
    public $ID;
    public $ProductID;
    public $CustomerID;
    public $Content;
    
    function __construct( $ID, $ProductID, $CustomerID, $Content) {
		$this->ID = $ID;
        $this->ProductID = $ProductID;
        $this->CustomerID = $CustomerID;
        $this->Content = $Content;
    }
}

?>