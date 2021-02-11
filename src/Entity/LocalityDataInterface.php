<?php

namespace App\Entity;

interface LocalityDataInterface
{
    public const LOCALITY_CSV_FILE_NAME = 'localitati.csv';

    public const COUNTRY_ID_COLUMN = 'country_id';
    public const NAME_COLUMN = 'name';
    public const NAME_LATIN_COLUMN = 'name_latin';
    public const SLUG_COLUMN = 'slug';
    public const REGION_COLUMN = 'region';
    public const REGION_LATIN_COLUMN = 'region_latin';
    public const CODE_COLUMN = 'code';
    public const LATITUDE_COLUMN = 'latitude';
    public const LONGITUDE_COLUMN = 'longitude';
    public const ALTITUDE_COLUMN = 'altitude';

    public const DATA_COLUMN_ARRAY = [
        'countryId' => self::COUNTRY_ID_COLUMN,
        'name' => self::NAME_COLUMN,
        'nameLatin' => self::NAME_LATIN_COLUMN,
        'slug' => self::SLUG_COLUMN,
        'region' => self::REGION_COLUMN,
        'regionLatin' => self::REGION_LATIN_COLUMN,
        'code' => self::CODE_COLUMN,
        'latitude' => self::LATITUDE_COLUMN,
        'longitude' => self::LONGITUDE_COLUMN,
        'altitude' => self::ALTITUDE_COLUMN,
    ];
}
