# filetobase64

### Usage:

install in Composer

`composer require mrcoco/filetobase64`

php code
```php
require __DIR__ . '/../vendor/autoload.php';

use Mrcoco\Filetobase64;

$filetobase64 = new Filetobase64();
# $file2base64 = new File2base64(['bmp' => 'image/bmp']);

$filetobase64->toFile('filetobase64.png', 'filetobase64.txt');
# echo $file2base64->toBase64('filetobase64.png');