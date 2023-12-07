## PHP Reflection

The PHP Reflection library provides a set of tools for performing class reflection in PHP. It allows you to retrieve information about classes, properties, methods, and constants using PHP's built-in reflection capabilities.

### Installation

You can install the PHP Reflection library via Composer. Run the following command in your project directory:
```bash
composer require sajadsdi/php-reflection
```

### Usage

To use the Reflections library, follow these steps:

1. Import the  `Reflections`  class into your PHP file:
```php
use Sajadsdi\PhpReflection\Reflections;
```
2. Create an instance of the  `Reflections`  class (use singleton for better performance):
```php
$reflections = new Reflections();
```
3.0. Perform class reflection:
```php
$class = new MyClass();
$reflectionClass = $reflections->reflection($class);

//or
$reflectionClass = $reflections->reflection(MyClass::class);

```
3.1.Retrieve properties, methods, or constants:
```php
$properties = $reflections->properties(MyClass::class);
$methods = $reflections->methods(MyClass::class);
$constants = $reflections->constants(MyClass::class);
```
### Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request on the GitHub repository.

### License

This library is open-source and released under the MIT License. See the [LICENSE](LICENSE) file for more information.

### Credits

The PHP Reflection library is developed and maintained by SajaD SaeeDi.

Feel free to use this library in your projects and enjoy the power of class reflection in PHP!
