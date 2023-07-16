<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessCategory;
use App\Models\OccupationCategory;
use App\Models\SpecialityCategory;
use App\Models\LocationCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasOne;

use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'occategory', 'bucategory',
        'vacancy_count', 'spcategory',
        'locategory', 'salary', 'deadline',
        'experience', 'skills', 'description'
    ];


    //user post piviot for savedJobs
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function occupation_category()
    {
        return $this->hasOne(OccupationCategory::class, 'id', 'occategory');
    }

    public function business_category()
    {
        return $this->hasOne(BusinessCategory::class, 'id', 'bucategory');
    }

    public function speciality_category()
    {
        return $this->hasOne(SpecialityCategory::class, 'id', 'spcategory');
    }

    public function location_category()
    {
        return $this->hasOne(LocationCategory::class, 'id', 'locategory');
    }

    public function deadlineTimestamp()
    {
        return Carbon::parse($this->deadline)->timestamp;
    }

    public function remainingDays()
    {
        $deadline = $this->deadline;
        $timestamp = Carbon::parse($deadline)->timestamp - Carbon::now()->timestamp;
        return $timestamp;
    }

    public function getSkills()
    {
        return explode(',', $this->skills);
    }

    public function getBucategoryJPAttribute()
    {
        $value = $this->bucategory;
        if($value){
        $categoryNames = collect(explode(",", $value))->map(function($bucategoryId){
                return BusinessCategory::find($bucategoryId)->category_name;
            })->toArray();
            return implode(",", $categoryNames);
        }else{
            return "";
        }
    }
    public function getOccategoryJPAttribute()
    {
        $value = $this->occategory;
        if($value){
        $categoryNames = collect(explode(",", $value))->map(function($occategoryId){
                return OccupationCategory::find($occategoryId)->category_name;
            })->toArray();
            return implode(",", $categoryNames);
        }else{
            return "";
        }
    }
    public function getSpcategoryJPAttribute()
    {
        $value = $this->spcategory;
        if($value){
        $categoryNames = collect(explode(",", $value))->map(function($spcategoryId){
                return SpecialityCategory::find($spcategoryId)->category_name;
            })->toArray();
            return implode(",", $categoryNames);
        }else{
            return "";
        }
    }
    public function getLocategoryJPAttribute()
    {
        $value = $this->locategory;
        if($value){
        $categoryNames = collect(explode(",", $value))->map(function($locategoryId){
                return LocationCategory::find($locategoryId)->category_name;
            })->toArray();
            return implode(",", $categoryNames);
        }else{
            return "";
        }
    }
}
