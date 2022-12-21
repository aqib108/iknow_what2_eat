<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorType extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'message',
        'status'
    ];
    public function errorReportings()
    {
        return $this->hasMany(ErrorReportings::class);
    }
}
