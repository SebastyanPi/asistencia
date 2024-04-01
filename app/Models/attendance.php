<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class attendance extends Model
{
    use HasFactory;

    protected $fillable = ["group","teacher","date","code","state"];


    protected static function boot()
    {
        parent::boot();
        self::creating(function(attendance $attendance) {
            do {

                $CODE = '';
                $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                $max = Str::length($pattern)-1;
                for($i=0;$i < 3 ;$i++){
                     $CODE .= $pattern[rand(0,$max)];
                };

            } while (attendance::where("code", $CODE)->first() instanceof attendance);
            $attendance->code = $CODE;
        });
    }    


}
