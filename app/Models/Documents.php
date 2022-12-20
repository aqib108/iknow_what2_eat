<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
       'url','documentable_type ','documentable_id',
    ];

    public function documentable()
    {
        return $this->morphTo();
    }
}
