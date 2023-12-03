<?php

namespace ArkaTech\IndoRegion\Traits;


trait VillageTrait
{
    /**
     * Check if village is sub province.
     *
     * @param int $code Code of province
     * @return bool
     */
    public function isProvince($code)
    {
        return $this->district->regency->province_code == $code ? true : false;
    }

    /**
     * Check if village is sub regency.
     *
     * @param int $code Code of regency
     * @return bool
     */
    public function isRegency($code)
    {
        return $this->district->regency_code == $code ? true : false;
    }

    /**
     * Check if village is sub district.
     *
     * @param int $code Code of district
     * @return bool
     */
    public function isDistrict($code)
    {
        return $this->district_code == $code ? true : false;
    }

    /**
     * Village belongs to Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency()
    {
        return $this->district->regency();
    }

    /**
     * Village belongs to Province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->district->regency->province();
    }
}
