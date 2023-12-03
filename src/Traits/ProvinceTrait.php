<?php

namespace ArkaTech\IndoRegion\Traits;


use App\Models\District;
use App\Models\Regency;

trait ProvinceTrait
{
    /**
     * Province has many districts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function districts()
    {
        return $this->hasManyThrough(District::class, Regency::class);
    }

    /**
     * check if province has districts by name.
     *
     * @param string|array $name District name or array of district names.
     * @param bool $requireAll All district in the array are required.
     *
     * @return bool
     */
    public function hasDistrictName($name, $requireAll = false)
    {
        if (is_array($name)) {
            foreach ($name as $districtName) {
                $hasDistrict = $this->hasDistrictName(strtoupper($districtName));
                if ($hasDistrict && !$requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getDistrictName = array_column($this->districts->toArray(), "name");
            if (in_array(strtoupper($name), $getDistrictName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * check if province has districts by Code.
     *
     * @param string|array $name District name or array of district names.
     * @param bool $requireAll All district in the array are required.
     *
     * @return bool
     */
    public function hasDistrictCode($code, $requireAll = false)
    {
        if (is_array($code)) {
            foreach ($code as $districtCode) {
                $hasDistrict = $this->hasDistrictCode($districtCode);
                if ($hasDistrict && !$requireAll) {
                    return true;
                } elseif (!$hasDistrict && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the districts were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the districts were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getDistrictCode = array_column($this->districts->toArray(), "id");
            if (in_array(strtoupper($code), $getDistrictCode)) {
                return true;
            }
        }
        return false;
    }
}
