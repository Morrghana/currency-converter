<?php
function convertCurrency($params)
{
	$currencyRates = json_decode(file_get_contents("currencyRates.json"), true);
	$rate = $currencyRates[$params['fromCurrency'] . "-" . $params['toCurrency']];
	$result = $params['amount'] * $rate;

	return $result;
}