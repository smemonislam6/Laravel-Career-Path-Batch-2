<?php

    namespace App\Helpers;

    interface StorageInterface
    {
        public function read($file);
        public function write($file, $data);
    }