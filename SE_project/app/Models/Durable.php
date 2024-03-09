<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Durable extends Model
{
    use HasFactory;
    protected $table = 'durable_articles';

    protected $fillable = [
        'durable_articles_id',
        'durable_articles_code',
        'name',
        'status',
    ];
    public static function getAll()
    {
        return $durable=\DB::table('durable_articles')->get();
    }
    
}
