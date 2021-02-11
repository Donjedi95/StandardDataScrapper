<?php

namespace App\Entity;

class Iso3166Country implements CountryDataInterface
{
    private int $id;
    private string $countryName;
    private string $officialStateName;
    private string $sovereignty;
    private string $alpha2Code;
    private string $alpha3Code;
    private string $numericCode;
    private string $subdivisionCodeLink;
    private string $internetCCTLD;

    public function __construct($data)
    {
        $this->id = (int) $data[self::NUMERIC_CODE_COLUMN];
        $this->countryName = $data[self::COUNTRY_NAME_COLUMN];
        $this->officialStateName = $data[self::OFFICIAL_STATE_NAME_COLUMN];
        $this->sovereignty = $data[self::SOVEREIGNTY_COLUMN];
        $this->alpha2Code = $data[self::ALPHA_2_CODE_COLUMN];
        $this->alpha3Code = $data[self::ALPHA_3_CODE_COLUMN];
        $this->numericCode = $data[self::NUMERIC_CODE_COLUMN];
        $this->subdivisionCodeLink = $data[self::SUBDIVISION_CODE_LINK_COLUMN];
        $this->internetCCTLD = $data[self::INTERNET_CCTLD_COLUMN];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountryName(): string
    {
        return $this->countryName;
    }

    public function getOfficialStateName(): string
    {
        return $this->officialStateName;
    }

    public function getSovereignty(): string
    {
        return $this->sovereignty;
    }

    public function getAlpha2Code(): string
    {
        return $this->alpha2Code;
    }

    public function getAlpha3Code(): string
    {
        return $this->alpha3Code;
    }

    public function getNumericCode(): string
    {
        return $this->numericCode;
    }

    public function getSubdivisionCodeLink(): string
    {
        return $this->subdivisionCodeLink;
    }

    public function getInternetCCTLD(): string
    {
        return $this->internetCCTLD;
    }
}
