<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function activityLogs(){
        return $this->hasMany(ActivityLog::class);
    }
}
