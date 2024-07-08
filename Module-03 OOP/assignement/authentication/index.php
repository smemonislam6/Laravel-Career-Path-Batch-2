<?php
use App\Model\Abc;
require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\FileHelper;
use App\Helpers\JsonStorage;

$filePath = "database/db.json";

$file = new FileHelper(new JsonStorage);


$data = ["name" => "Monir"];
$file->writeFile($filePath, $data);

$abcd = $file->readFile($filePath);

echo "<pre>";
print_r($abcd);
echo "</pre>";

