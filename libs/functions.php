<?php

function convertCurrency($params)
{
	$currencyRates = json_decode(file_get_contents("currencyRates.json"), true);
	$rates = $currencyRates[strtoupper($params['fromCurrency'])];
	$currentRate = $rates[strtoupper($params['toCurrency'])];
	$result = ($params['amount'] * $currentRate) . ' ' . strtoupper($params['toCurrency']) ;

	return $result;
}
