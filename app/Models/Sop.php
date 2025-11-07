<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Action;

class Sop extends Model
{
    use HasFactory;

    public function activity()
    {
        return $this->hasMany(Activity::class, 'sop_id');
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'sop_id');
    }
}
