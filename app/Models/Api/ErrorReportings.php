<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorReportings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'message',
        'error_type_id'
    ];
    public function errorType()
    {
        return $this->belongsTo(ErrorType::class );
    }
}
