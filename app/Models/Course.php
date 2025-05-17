<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function formateur()
{
    return $this->belongsTo(User::class, 'formateur_id');
}

public function modules()
{
    return $this->hasMany(Module::class);
}
    //
}
