<?php

namespace App\Service;

use App\Entity\Iso3166Country;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeWikipediaService extends AbstractScrapper
{
    protected const ISO_3166_COUNTRY_CODES_URL = 'https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes';
    protected const INFO_COLUMNS = 8;

    public function scrapeIso3166Countries(): string
    {
        $pageContents = file_get_contents(self::ISO_3166_COUNTRY_CODES_URL);

        $crawler = new Crawler($pageContents);
        $iso3166Countries = $crawler->filter('table > tbody > tr')->each(function (Crawler $node, $i) {
            if (count($node->children()) === self::INFO_COLUMNS) {
                $countryData = $node->filter('td')->each(function (Crawler $innerNode, $j) {
                    $text = $innerNode->filter('span.monospaced')->each(
                        function(Crawler $nd) use ($j) {
                            return trim($nd->text());
                        }
                    );

                    if (empty($text)) {
                        $text = trim($innerNode->text());
                    } else {
                        $text = $text[0];
                    }

                    $text = $this->cleanText($text);

                    if ($j === 7) {
                        $text = substr($text, 0, 3);
                    }

                    return $text;
                });

                if (count($countryData) === self::INFO_COLUMNS) {
                    $countryData = [
                        Iso3166Country::COUNTRY_NAME_COLUMN => $countryData[0],
                        Iso3166Country::OFFICIAL_STATE_NAME_COLUMN => $countryData[1],
                        Iso3166Country::SOVEREIGNTY_COLUMN => $countryData[2],
                        Iso3166Country::ALPHA_2_CODE_COLUMN => $countryData[3],
                        Iso3166Country::ALPHA_3_CODE_COLUMN => $countryData[4],
                        Iso3166Country::NUMERIC_CODE_COLUMN => $countryData[5],
                        Iso3166Country::SUBDIVISION_CODE_LINK_COLUMN => $countryData[6],
                        Iso3166Country::INTERNET_CCTLD_COLUMN => $countryData[7]
                    ];

                    $iso3166Country = new Iso3166Country($countryData);
                    $iso3166Countries[] = $iso3166Country;
                }
            }

            return $iso3166Country ?? null;
        });

        foreach ($iso3166Countries as $key => $country) {
            if ($country === null) {
                unset($iso3166Countries[$key]);
            }
        }

        return $this->getSqlInsertString($iso3166Countries, 'country', [
            'id' => Iso3166Country::ID_COLUMN,
            'countryName' => Iso3166Country::COUNTRY_NAME_COLUMN,
            'officialStateName' => Iso3166Country::OFFICIAL_STATE_NAME_COLUMN,
            'alpha2Code' => Iso3166Country::ALPHA_2_CODE_COLUMN,
            'alpha3Code' => Iso3166Country::ALPHA_3_CODE_COLUMN,
            'numericCode' => Iso3166Country::NUMERIC_CODE_COLUMN,
            'internetCCTLD' => Iso3166Country::INTERNET_CCTLD_COLUMN
        ]);
    }

    function getDataColumnArray(): array
    {
        return Iso3166Country::DATA_COLUMN_ARRAY;
    }
}
