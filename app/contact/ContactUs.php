<?php

namespace App\contact;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'contact_firstName',
        'contact_email',
        'contact_subject',
        'contact_message',
    ];
}
