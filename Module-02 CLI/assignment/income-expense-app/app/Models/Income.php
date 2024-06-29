<?php

namespace App\Models;

use App\Helpers\FileHelper;

class Income {
    private $file = 'data/income.json';
    private $incomes = [];

    public function __construct() {
        $this->incomes = FileHelper::readFile($this->file);
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
        FileHelper::writeFile($this->file, $this->incomes);
    }

    public function getIncomes() {
        return $this->incomes;
    }
}
