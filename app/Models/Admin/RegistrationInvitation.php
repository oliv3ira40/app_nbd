<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RegistrationInvitation extends Model
{
    protected $table = 'registration_invitations';
    protected $fillable = [
        'email',
    ];
}