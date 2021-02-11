<?php

namespace App\Entity;

interface CountryDataInterface
{
    public const ID_COLUMN = 'id';
    public const COUNTRY_NAME_COLUMN = 'name';
    public const OFFICIAL_STATE_NAME_COLUMN = 'official_state_name';
    public const SOVEREIGNTY_COLUMN = 'sovereignty';
    public const ALPHA_2_CODE_COLUMN = 'iso_3166_alpha_2_code';
    public const ALPHA_3_CODE_COLUMN = 'iso_3166_alpha_3_code';
    public const NUMERIC_CODE_COLUMN = 'iso_3166_numeric_code';
    public const SUBDIVISION_CODE_LINK_COLUMN = 'subdivision_code_link';
    public const INTERNET_CCTLD_COLUMN = 'internet_cc_tld';

    public const DATA_COLUMN_ARRAY = [
        'id' => self::ID_COLUMN,
        'countryName' => self::COUNTRY_NAME_COLUMN,
        'officialStateName' => self::OFFICIAL_STATE_NAME_COLUMN,
        'sovereignty' => self::SOVEREIGNTY_COLUMN,
        'alpha2Code' => self::ALPHA_2_CODE_COLUMN,
        'alpha3Code' => self::ALPHA_3_CODE_COLUMN,
        'numericCode' => self::NUMERIC_CODE_COLUMN,
        'subdivisionCodeLink' => self::SUBDIVISION_CODE_LINK_COLUMN,
        'internetCCTLD' => self::INTERNET_CCTLD_COLUMN
    ];
}
