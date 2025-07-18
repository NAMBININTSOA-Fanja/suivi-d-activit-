<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    public function application(){
        return $this->belongsTo(Application::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
