<?php

class Cost {

	public static function productTotal($price, $quantity) {
	
		$total = $price*$quantity;
		
		echo $total;
	}

	
}