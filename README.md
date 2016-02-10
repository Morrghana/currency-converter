Currency converter - console application

For this console application is used the Symfony Console Component. You can install it through composer.

You can execute a command in the console: php converter {command} {params}
There are three commands:

1. Download the current currency rates:
	- used Fixer.io JSON API
	- saved in currencyRates.json.
	- command is:
		php converter downloadRates

2. Check currency rate:
	- command:
		php converter getRate {fromCurrency} {toCurrency}
	- example:
		php converter getRate USD EUR

3. Convert currency
	- command:
		php converter convert {amount} {fromCurrency} {toCurrency}
	- example:
		php converter convert 100 EUR BGN
