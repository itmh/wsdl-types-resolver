### wsdl-types-resolver
Библиотека для извлечения типов функции по WSDL.

##### Пример использования
```php
$soapClient = new SoapClient('http://www.webservicex.com/globalweather.asmx?WSDL');
$resolver = new Resolver(
    (new FunctionParser($soapClient->__getFunctions()))->getFunctions(),
    (new TypeParser($soapClient->__getTypes()))->getTypes()
);
print_r($resolver->resolve('GetWeather'));
```

```
Array
(
    [arguments] => Array
        (
            [0] => Array
                (
                    [CityName] => string
                    [CountryName] => string
                )

        )

    [result] => Array
        (
            [GetWeatherResult] => string
        )

)
```
