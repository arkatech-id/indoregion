<?php

use PHPUnit\Framework\TestCase;
use ArkaTech\IndoRegion\RawDataGetter as RawData;

/**
 * Data Test
 */
class RawDataTest extends TestCase
{
    /**
     * Test Provinces Data
     *
     * @return void
     */
    public function testProvinces()
    {
        $data = RawData::getProvinces();

        $this->assertTrue(count($data) == 37);
    }

    /**
     * Test Regencies Data
     *
     * @return void
     */
    public function testRegencies()
    {
        $data = RawData::getRegencies();

        $this->assertTrue(count($data) == 514);
    }

    /**
     * Test Districts Data
     *
     * @return void
     */
    public function testDistricts()
    {
        $data = RawData::getDistricts();

        $this->assertTrue(count($data) == 7277);
    }

    /**
     * Test Villages Data
     *
     * @return void
     */
    public function testVillages()
    {
        $data = RawData::getVillages();

        $this->assertTrue(count($data) == 83761);
    }
}