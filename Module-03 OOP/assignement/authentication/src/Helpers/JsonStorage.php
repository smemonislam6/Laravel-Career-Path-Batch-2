<?php
    namespace App\Helpers;

    class JsonStorage implements StorageInterface
    {
        public function read($filePath): array
        {
            if(file_exists($filePath))
            {
                $data = file_get_contents($filePath);
                $data = json_decode($data, true);
                return $data;
            }

            return [];
        }

        public function write($filePath, $newData):void
        {

            if(file_exists($filePath))
            {
                $data = file_get_contents($filePath);
                $data = json_decode($data, true);
            }else{
                $data = [];
            }

            $data[] = $newData;           

            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($filePath, $data);
        }
    }