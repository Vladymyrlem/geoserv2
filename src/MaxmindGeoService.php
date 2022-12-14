<?php

namespace Hillel\GeoService2;
use GeoIp2\Database\Reader;
use Hillel\GeoInterface\GeoServiceInterface;

class MaxmindGeoService implements GeoServiceInterface
{
    protected $reader;

    protected $data;

    public function __construct()
    {
        $this->reader = new Reader(
            base_path() . DIRECTORY_SEPARATOR .
            'database' . DIRECTORY_SEPARATOR . 'geoip' . DIRECTORY_SEPARATOR .
            'GeoLite2-Country.mmdb'
        );
    }
    public function parse($ip)
    {
        $this->data = $this->reader->country($ip);

    }
    public function continentCode()
    {
        return $this->data->continent->code;
    }
    public function countryCode()
    {
        return $this->data->country->isoCode;
    }
}
