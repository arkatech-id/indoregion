<?php

namespace ArkaTech\IndoRegion\Traits;


trait DistrictTrait
{
    /**
     * Check if district is sub province.
     *
     * @param int $code Code of province
     * @return bool
     */
    public function isProvince($code)
    {
        return $this->regency->province_code == $code ? true : false;
    }

    /**
     * Check if district is sub regency.
     *
     * @param int $code Code of regency
     * @return bool
     */
    public function isRegency($code)
    {
        return $this->regency_code == $code ? true : false;
    }

    /**
     * District belongs to Province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->regency->province();
    }
}
