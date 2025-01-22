<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{


    protected $fillable  = ['name_project', 'location', 'email', 'logo'];
    protected $appends = [
        'name_project_ar','location_ar' ,'logo_full_path',
    ];

    public function getNameProjectArAttribute()
    {
        $translation = Translation::where('model', 'Setting')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'name_project')
            ->first();

        return $translation ? $translation->value : null;
    }
    public function getLocationArAttribute()
    {
        $translation = Translation::where('model', 'Setting')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'location')
            ->first();

        return $translation ? $translation->value : null;
    }
}
