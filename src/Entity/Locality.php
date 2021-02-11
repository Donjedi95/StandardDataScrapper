<?php

namespace App\Entity;

class Locality implements LocalityDataInterface
{
    private int $countryId;
    private string $name;
    private string $nameLatin;
    private string $slug;
    private string $region;
    private string $regionLatin;
    private string $code;
    private string $latitude;
    private string $longitude;
    private string $altitude;

    public function __construct($data) {
        $this->countryId = $data[self::COUNTRY_ID_COLUMN];
        $this->name = $data[self::NAME_COLUMN];
        $this->nameLatin = $data[self::NAME_LATIN_COLUMN];
        $this->slug = $data[self::SLUG_COLUMN];
        $this->region = $data[self::REGION_COLUMN];
        $this->regionLatin = $data[self::REGION_LATIN_COLUMN];
        $this->code = $data[self::CODE_COLUMN];
        $this->latitude = $data[self::LATITUDE_COLUMN];
        $this->longitude = $data[self::LONGITUDE_COLUMN];
        $this->altitude = $data[self::ALTITUDE_COLUMN];
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNameLatin(): string
    {
        return $this->nameLatin;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getRegionLatin(): string
    {
        return $this->regionLatin;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function getAltitude(): string
    {
        return $this->altitude;
    }
}
