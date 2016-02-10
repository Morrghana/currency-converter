<?php

namespace Libs;

class CurrencyRatesUpdater
{
    private $latesUrl = 'http://api.fixer.io/latest';
    private $baseUrl = 'http://api.fixer.io/latest?base=';

    public function getRates()
    {
        $data = $this->getLatestRates();
        $rates = array();
        $rates[$data['base']] = $data['rates'];

        foreach ($data['rates'] as $key => $value) {
            $result = $this->getBaseRates($key);
            $rates[$result['base']] = $result['rates'];
        }

        $rates = json_encode($rates);

        return $this->writeToFile($rates);

    }

    private function makeCurlRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($data, true);

        return $data;
    }

    private function getLatestRates()
    {
        return  $this->makeCurlRequest($this->latesUrl);
    }

    private function getBaseRates($country)
    {
        return $this->makeCurlRequest($this->baseUrl . $country);
    }

    private function writeToFile($info)
    {
        $result = file_put_contents('currencyRates.json', $info);
        return $result;
    }
}
