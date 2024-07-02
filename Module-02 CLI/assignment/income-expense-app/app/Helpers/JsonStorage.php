<?php
    namespace App\Helpers;

    class JsonStorage implements StorageInterface
    {
        public function read($file) {
            if(file_exists($file))
            {
                $data = file_get_contents($file);
                return json_decode($data, true);
            }

            return [];
        }
        public function write($file, $data){
            $jsonData  = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($file, $jsonData);
        }
    }