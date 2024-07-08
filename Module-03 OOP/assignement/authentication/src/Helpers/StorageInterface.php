<?php
    namespace App\Helpers;

    interface StorageInterface 
    {
        public function read($filePath):array;
        public function write($filePath, $data):void;
    }