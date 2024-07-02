<?php
    namespace App\Helpers;

    class TextStorage implements StorageInterface
    {
        public function read($file)
        {
            if(file_exists($file))
            {
                $data = file_get_contents($file);
                return $this->parseTextData($data);
            }

            return [];
        }
        public function write($file, $data)
        {
            $textData = $this->convertToTextData($data);
            file_put_contents($file, $textData);
        }

        public function parseTextData($data)
        {
            $lines = explode(PHP_EOL, trim($data));
            $pasreData = [];
            foreach($lines as $line)
            {
                if(!empty($line))
                {
                    $pasreData[] = $line;
                }
            }

            return $pasreData;
        }

        public function convertToTextData($data)
        {
            $lines = [];

            foreach ($data as $entry) {
                $lines[] = implode(',', $entry);
            }
    
            return implode(PHP_EOL, $lines);
        }
    }
