# Array Object

The ArrayAccess interface implementation.

## Installation

`composer require denis909/array-object:dev-master`

## Using

~~~
use denis909\ArrayObject\ArrayObject;

$obj = new ArrayObject(['param1' => 'value']);

echo $obj['param1'];

echo $obj->param1;
~~~

## Testing

#### Windows

vendor\bin\phpunit.bat vendor\denis909\array-object\tests

#### Linux

./vendor/bin/phpunit vendor/denis909/array-object/tests