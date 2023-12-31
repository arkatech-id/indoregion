<?php

namespace ArkaTech\IndoRegion\Traits;


use App\Models\District;
use App\Models\Village;

trait RegencyTrait
{
    /**
     * regency has many villages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function villages()
    {
        return $this->hasManyThrough(Village::class, District::class);
    }

    /**
     * check if regency has villages by name.
     *
     * @param string|array $name villages name or array of villages names.
     * @param bool $requireAll All villages in the array are required.
     *
     * @return bool
     */
    public function hasVillageName($name, $requireAll = false)
    {
        if (is_array($name)) {
            foreach ($name as $villageName) {
                $hasVillage = $this->hasVillageName(strtoupper($villageName));
                if ($hasVillage && !$requireAll) {
                    return true;
                } elseif (!$hasVillage && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the villages were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the villages were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getVillageName = array_column($this->villages->toArray(), "name");
            if (in_array(strtoupper($name), $getVillageName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * check if regency has villages by Code.
     *
     * @param string|array $name Villages name or array of villages names.
     * @param bool $requireAll All villages in the array are required.
     *
     * @return bool
     */
    public function hasVillageCode($code, $requireAll = false)
    {
        if (is_array($code)) {
            foreach ($code as $villageCode) {
                $hasVillage = $this->hasVillageCode($villageCode);
                if ($hasVillage && !$requireAll) {
                    return true;
                } elseif (!$hasVillage && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the villages were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the villages were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            $getVillageCode = array_column($this->villages->toArray(), "id");
            if (in_array(strtoupper($code), $getVillageCode)) {
                return true;
            }
        }
        return false;
    }
}
