<?php

function divideString($str, $n) {
	return strrev(chunk_split (strrev($str), $n,' '));
}

function barcodeToStr($barcode, $flag = true, $is_receiver = null)
{
	$barcode = str_replace(' ', '', $barcode);
	$numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
	$str = ['z', 'y', 'x', 'q', 'w', 'e', 'r', 't', 'a', 'b'];
	if ($flag) {
		$code = str_replace($numbers, $str, $barcode);
		$param = 's';
		$rCode = '';
		if (!is_null($is_receiver) and $is_receiver === false) {
			$rCode = str_replace($numbers, $str, '0');
		} elseif (!is_null($is_receiver) and $is_receiver === true) {
			$rCode = str_replace($numbers, $str, '1');
		}
		if ($rCode) {
			return $code.$param.$rCode;
		}
		return $code;
	} else {
		$code = str_replace($str, $numbers, $barcode);
		$codes = explode('s', $code);
		$barcode = $codes[0] ?? '';
		$is_receiver = null;
		if (isset($codes[1]) and (string)$codes[1] === '1') {
			$is_receiver = true;
		} elseif (isset($codes[1]) and (string)$codes[1] === '0') {
			$is_receiver = false;
		}
		return [
			'barcode'     => $barcode,
			'is_receiver' => $is_receiver
		];
	}
}

?>