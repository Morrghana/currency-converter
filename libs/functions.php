<?php

function convertCurrency($params)
{
	$currencyRates = json_decode(file_get_contents("currencyRates.json"), true);
	if(isset($currencyRates[strtoupper($params['fromCurrency'])])) {
	   $rates = $currencyRates[strtoupper($params['fromCurrency'])];
	} else {
	    return false;
	}

	if(isset($rates[strtoupper($params['toCurrency'])])) {
	   $currentRate = $rates[strtoupper($params['toCurrency'])];
	} else {
	    return false;
	}

	$result = ($params['amount'] * $currentRate) . ' ' . strtoupper($params['toCurrency']) ;

	return $result;
}
