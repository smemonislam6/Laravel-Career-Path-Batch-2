<?php

namespace App\Models;

use App\Helpers\StorageInterface;

class Income {
    private $file = 'data/income.json';
    private $incomes = [];
    private $storage;
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->incomes = $this->storage->read($this->file);
        if ($this->incomes === null) {
            $this->incomes = [];
        }
    }

    public function addIncome($amount, $category) {
        $income = [
            'amount' => $amount,
            'category' => $category,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->incomes[] = $income;
        $this->storage->write($this->file, $this->incomes);
    }

    public function getIncomes():array 
    {
        return $this->incomes;
    }
}
