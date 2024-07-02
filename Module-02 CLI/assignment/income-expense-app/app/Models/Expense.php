<?php

namespace App\Models;

use App\Helpers\StorageInterface;

class Expense {
    private $file = 'data/expense.json';
    private $expenses = [];
    private $storage;

    public function __construct(StorageInterface $storage) 
    {
        $this->storage = $storage;
        $this->expenses = $this->storage->read($this->file);
        if ($this->expenses === null) {
            $this->expenses = [];
        }
    }

    public function addExpense($amount, $category) 
    {
        $expense = [
            'amount' => $amount,
            'category' => $category,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->expenses[] = $expense;

        $this->storage->write($this->file, $this->expenses);
    }

    public function getExpenses()
    {
        return $this->expenses;
    }
}
