<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the student's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ucwords($this->name).' '.ucfirst($this->last_name).' '.ucfirst($this->mothers_last_name);
    }

    /**
     * Get the student's name.
     *
     * @param  string  $value
     * @return void
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Get the student's last name.
     *
     * @param  string  $value
     * @return void
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's mother's last name.
     *
     * @param  string  $value
     * @return void
     */
    public function getMothersLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's curp.
     *
     * @param  string  $value
     * @return string
     */
    public function getCurpAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Get the student's group.
     *
     * @param  string  $value
     * @return string
     */
    public function getGroupAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's observations.
     *
     * @param  string  $value
     * @return string
     */
    public function getObservationsAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's first period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function getFirstPeriodQualificationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's second period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function getSecondPeriodQualificationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's third period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function getThirdPeriodQualificationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the student's average.
     *
     * @return string
     */
    public function getAverageAttribute()
    {
        if (is_numeric($this->first_period_qualification) && is_numeric($this->second_period_qualification) && is_numeric($this->third_period_qualification)) {
            return number_format(((float) $this->first_period_qualification + (float) $this->second_period_qualification + $this->third_period_qualification) / 3, 1);
        }
        
        return 'N/A';
    }

    /**
     * Get the student's grade and group.
     *
     * @return string
     */
    public function getGradeAndGroupAttribute()
    {
        return "{$this->grade}° ".mb_strtoupper($this->group);
    }

    /**
     * Set the student's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    /**
     * Set the student's last name.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = mb_strtolower($value);
    }

    /**
     * Set the student's mother's last name.
     *
     * @param  string  $value
     * @return void
     */
    public function setMothersLastNameAttribute($value)
    {
        $this->attributes['mothers_last_name'] = mb_strtolower($value);
    }

    /**
     * Set the student's curp.
     *
     * @param  string  $value
     * @return void
     */
    public function setCurpAttribute($value)
    {
        $this->attributes['curp'] = mb_strtolower($value);
    }

    /**
     * Set the student's grade.
     *
     * @param  string  $value
     * @return void
     */
    public function setGradeAttribute($value)
    {
        $this->attributes['grade'] = mb_strtolower($value);
    }

    /**
     * Set the student's group.
     *
     * @param  string  $value
     * @return void
     */
    public function setGroupAttribute($value)
    {
        $this->attributes['group'] = mb_strtolower($value);
    }

    /**
     * Set the student's first period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstPeriodQualificationAttribute($value)
    {
        $this->attributes['first_period_qualification'] = mb_strtolower($value);
    }

    /**
     * Set the student's second period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function setSecondPeriodQualificationAttribute($value)
    {
        $this->attributes['second_period_qualification'] = mb_strtolower($value);
    }

    /**
     * Set the student's third period qualification.
     *
     * @param  string  $value
     * @return void
     */
    public function setThirdPeriodQualificationAttribute($value)
    {
        $this->attributes['third_period_qualification'] = mb_strtolower($value);
    }

    /**
     * Set the student's observations.
     *
     * @param  string  $value
     * @return void
     */
    public function setObservationsAttribute($value)
    {
        $this->attributes['observations'] = mb_strtolower($value);
    }

    public function scopeFinderFilter($query, $search)
    {
        if ($search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                 ->orWhere('last_name', 'LIKE', "%{$search}%")
                 ->orWhere('mothers_last_name', 'LIKE', "%{$search}%")
                 ->orWhere('curp', 'LIKE', "%{$search}%");
        }
    }
}
