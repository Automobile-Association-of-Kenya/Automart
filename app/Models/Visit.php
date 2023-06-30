<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'port',
        'url',
        'user_agent',
        'platform',
        'time'
    ];

    static function visit($server) {
        self::create([
            'ip_address'=>$server["REMOTE_ADDR"],
            'port'=>$server["REMOTE_PORT"],
            'url'=>$server["REQUEST_URI"],
            'method'=>$server["REQUEST_METHOD"],
            'user_agent'=>$server["HTTP_USER_AGENT"],
            'platform'=>$server["HTTP_SEC_CH_UA_PLATFORM"],
            'time'=>$server["REQUEST_TIME"],
        ]);
    }
}
