<?php
function kdPenjualan($panjang)
{
	$data 	= '1234567890';
	$dep 	= "PJL-";

	for ($i=0; $i < $panjang; $i++) { 
	 	$pos = rand(0, strlen($data)-1);
	 	$dep .= $data{$pos}; 
	} 
	return $dep;
}
?>