# PhpIncExSdk

is the PHP SDK implementation of 
 * [rfc8727], JSON Binding of the Incident Object Description Exchange Format ([rfc7970])
 * supports json parse/write and the IODEFdocument class instance [rfc8727] validation.


#### Usage

For package class and property structure, examine [rfc8727] _3.1. Classes and Elements_.<br>

All classes has a (no-arg) factory method, some also with factory method and mandatory properties,
ex `IncidentID::factoryNameId( name, id )`.

All properties has `get<Prop>`,`set<Prop>` and `is<Prop>Set` methods, 
for *array* properties also `add<Prop>` method.

To support the usage of unique id's (`IncidentID::id`, `IndicatorID::id`, `*::observable-id`, `*::uid-ref` etc), 
the (static) method `<class>::createGUID()` is available, return a v4 guid.
 
###### the (entry) PhpIncExSdk class methods :

Properties, equipped with `get` and `set`  methods 
 * `dto` *IODEFdocument instance*
 * `jsonString` *string*

`factory( [ jsonString [, dto ]] )`
 * Class factory method
 * `jsonString` *string*
 * `dto` *IODEFdocument class instance*
 * return *static*
 * static

`factoryJsonParse( jsonString )`
 * Class factory method, parse jsonString into (internal dto) IODEFdocument instance
 * (with json default flags JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR)
 * `jsonString` *string*
 * return *static*
 * throws *RuntimeException*
 * static

`factoryJsonWrite( dto [ prettyPrint] )`
 * Class factory method, write IODEFdocument instance into (internal) jsonString
 * `dto` *IODEFdocument class instance*
 * `prettyPrint` *bool* default false
 * return *static*
 * throws *RuntimeException*
 * static

`function jsonParse( [ jsonString [, flags] )`
 * Parse jsonString into (internal dto) IODEFdocument class instance
 * `jsonString` *string*
 * `flags` *int*    default JSON_OBJECT_AS_ARRAY | JSON_THROW_ON_ERROR
 * return *static*
 * throws *RuntimeException*

`jsonWrite( [ dto [, prettyPrint [, flags ]]] )`
 * Write IODEFdocument instance into (internal) jsonString
 * `dto` *IODEFdocument class instance*
 * `prettyPrint` *bool* default false
 * `flags` *int*  default JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
 * return *static*
 * throws *RuntimeException*

`validateDto( [ dto [, result ]] )`
 * Validate IODEFdocument class instance
 * `dto` *IODEFdocument class instance*
 * `result` *array* contain opt missing required parts on false return
 * return *bool* true on success
 * throws *RuntimeException*

###### Example

Parse [rfc8727] json string into a IODEFdocument class instance

```php
<?php

use Kigkonsult\PhpIncExSdk\PhpIncExSdk;

// get a rfc8727 json string
$jsonString = ....

$dto = PhpIncExSdk::factoryJsonParse( $jsonString )
    ->getDto();

```

Write the [rfc8727] IODEFdocument class instance to  json string 

```php
<?php

use Kigkonsult\PhpIncExSdk\PhpIncExSdk;

// create a IODEFdocument class instance 
$dto = ....

$jsonString = PhpIncExSdk::factoryJsonWrite( $dto )
    ->getJsonString();

```

Validate the [rfc8727] IODEFdocument class instance
```php
<?php

use Kigkonsult\PhpIncExSdk\PhpIncExSdk;

// get a rfc8727 json string
$jsonString = ....

// parse the rfc8727 json string
$phpIncExSdk = PhpIncExSdk::factory()
    ->jsonParse( jsonString );

if( ! $phpIncExSdk->validateDto( null, $result = [] )) {
    var_export( $result, true );
    ...
}


```


#### Support

For support use [github.com/PhpIncExSdk]. Non-emergence support issues are, unless sponsored, fixed in due time.


#### Sponsorship

Donation using [paypal.me/kigkonsult] are appreciated.
For invoice, please e-mail</a>.


#### Installation

Composer

From the Command Line:

```
composer require kigkonsult/PhpIncExSdk
```

In your composer.json:

```
{
    "require": {
        "kigkonsult/PhpIncExSdk": ">=1.0"
    }
}
```

#### License

PhpIncExSdk is licensed under the LGPLv3 License.

[github.com/PhpIncExSdk]:https://github.com/iCalcreator/PhpJsCalendar/issues
[paypal.me/kigkonsult]:https://paypal.me/kigkonsult
[rfc7970]:https://www.rfc-editor.org/info/rfc7970
[rfc8727]:https://www.rfc-editor.org/info/rfc8727
