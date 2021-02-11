<?php

namespace App\Service;

use App\Entity\Locality;

class ScrapeCsvService extends AbstractScrapper
{
    public function scrapeLocalityCsv($pathToFile, $countryId): string
    {
        $handle = fopen($pathToFile, "r");

        $lineNumber = 1;
        $localities = [];
        while(($rawString = fgets($handle)) !== false) {
            $row = str_getcsv($rawString);

            if ($lineNumber !== 1) {
                $localityData = [
                    Locality::COUNTRY_ID_COLUMN => $countryId,
                    Locality::NAME_LATIN_COLUMN => $row[1],
                    Locality::SLUG_COLUMN => $row[1],
                    Locality::NAME_COLUMN => $row[2],
                    Locality::REGION_LATIN_COLUMN => $row[3],
                    Locality::REGION_COLUMN => $row[3],
                    Locality::CODE_COLUMN => $row[4],
                    Locality::LATITUDE_COLUMN => $row[7],
                    Locality::LONGITUDE_COLUMN => $row[8],
                    Locality::ALTITUDE_COLUMN => 0,
                ];

                $localities[] = new Locality($localityData);
            }

            $lineNumber++;
        }

        fclose($handle);

        return $this->getSqlInsertString($localities, 'locality');
    }

    function getDataColumnArray(): array
    {
        return Locality::DATA_COLUMN_ARRAY;
    }
}
