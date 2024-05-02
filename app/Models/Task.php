<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    


    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        // Format the created_at attribute using Carbon
        return Carbon::parse($this->attributes['created_at'])->format('F j, Y');
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['formatted_created_at'] = $this->formatted_created_at;
        return $array;
    }

    
}
