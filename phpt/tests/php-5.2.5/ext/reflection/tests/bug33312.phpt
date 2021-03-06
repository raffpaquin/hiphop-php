--TEST--
Reflection Bug #33312 (ReflectionParameter methods do not work correctly)
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--FILE--
<?php
class Foo {
    public function bar(Foo $foo, $bar = 'bar') {
    }
}

$class = new ReflectionClass('Foo');
$method = $class->getMethod('bar');

foreach ($method->getParameters() as $parameter) {
    if ($parameter->isDefaultValueAvailable()) {
        print $parameter->getDefaultValue()."\n";
    }
}
?>
--EXPECT--
bar
