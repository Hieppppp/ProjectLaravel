<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    public $timestamps = false ; // set time to false
    protected $fillable = [
        'site_title',
        'site_about',
        
    ];
    protected $primaryKey = 'id';
    protected $table ='settings';
}
