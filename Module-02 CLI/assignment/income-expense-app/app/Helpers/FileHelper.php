<?php

namespace App\Helpers;

class FileHelper {
    private $storage;
    public function __construct(StorageInterface $storage) {
        $this->storage = $storage;
    }

    public function readFile($file)
    {
        return $this->storage->read($file);
    }
    public function writeFile($file, $data)
    {
        $this->storage->write($file, $data);
    }
}
