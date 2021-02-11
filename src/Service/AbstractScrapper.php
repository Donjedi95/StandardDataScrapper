<?php

namespace App\Service;

use App\Entity\Locality;

abstract class AbstractScrapper
{
    abstract function getDataColumnArray(): array;

    protected function cleanText($text): string {
        $text = str_replace([" ", " "], "", $text);
        return trim(preg_replace("/\[[^]]+]/", "", $text), ' ');
    }

    protected function getSqlInsertString(array $localities, string $tableName, array $specificColumns = []): string
    {
        $columns = $this->getDataColumnArray();
        if (!empty($specificColumns)) {
            $columns = $specificColumns;
        }

        $sql = "INSERT INTO " . $tableName . '(' . implode(', ', $columns) . ')' . "\n" . ' VALUES' . "\n";

        /** @var Locality $locality */
        foreach ($localities as $i => $locality) {
            foreach ($columns as $key => $column) {
                $getterName = 'get' . ucfirst($key);

                if (array_key_first($columns) === $key) {
                    $sql .= '(';
                }

                $sql .= '"' . $locality->$getterName() . '"';

                if (array_key_last($columns) !== $key) {
                    $sql .= ', ';
                } else {
                    if (array_key_last($localities) === $i) {
                        $sql .= ')' . "\n";
                    } else {
                        $sql .= '),' . "\n";
                    }
                }
            }
        }

        return $sql;
    }
}
