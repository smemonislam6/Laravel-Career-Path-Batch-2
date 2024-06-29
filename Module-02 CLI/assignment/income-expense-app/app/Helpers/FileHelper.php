<?php

namespace App\Helpers;

class FileHelper {
    public static function readFile($file) {
        if (file_exists($file)) {
            $data = file_get_contents($file);
            return json_decode($data, true);
        }
        return null;
    }

    public static function writeFile($file, $data) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($file, $jsonData);
    }
}
