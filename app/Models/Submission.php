<?php

namespace App\Models;

use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory, EncryptableDbAttribute;

    protected $guarded = [];

    protected $encryptable = [
        'salesforce_lead_id'
    ];

    public function getRouteKeyName(){
        return 'uuid';
    }

}
