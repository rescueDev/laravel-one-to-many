<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'priority',
    ];

    public function employee()
    {

        return $this->belongsTo(Employee::class);
    }
    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }
}
