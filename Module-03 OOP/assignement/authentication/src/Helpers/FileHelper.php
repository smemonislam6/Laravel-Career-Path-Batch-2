<?php
    namespace App\Helpers;

    class FileHelper
    {
        private $storage;
        public function __construct(StorageInterface $storage)
        {
            $this->storage = $storage;
        }

        public function readFile($filePath)
        {
            return $this->storage->read($filePath);
        }

        public function writeFile($filePath, $data):void
        {
            $this->storage->write($filePath, $data);
        }
    }