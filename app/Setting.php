<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ["facebook", "instagram", "twitter", "whatsapp", "phone_1", "phone_2", "email_1", "email_2", "address"];
}
