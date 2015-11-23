<?php

class Product
{

private $id = 0;

private $p_b_id='';
private $p_c_id='';

//set product id

public function setproductID($productid)
{
	$this->id = $productid;

	return $this->id;
}

//set brand id

public function setBrandId($brandid)
{
	$this->p_b_id=$brandid;
	
	return $this->p_b_id;
}

//set category id

public function setCategoryId($categoryid)
{
	$this->p_c_id=$categoryid;
	
	return $this->p_c_id;
}

public function productinfo()
{

	global $db;

	$productinfo = $db->get_results("SELECT * FROM product WHERE p_b_id='$this->p_b_id' AND p_c_id='$this->p_c_id' ");
	
	return $productinfo;
}










}

?>