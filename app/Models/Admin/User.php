<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'email',
        'telephone',
        'cpf',
        'date_of_birth',
        'password',
        'registration_completed',
        'skip_record',
        'group_id',
        'deleted_at',
        'group_for_entity_id',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];

 
 
    function Group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function UserHasEntity() {
        return $this->hasOne('App\Models\Entities\UserHasEntity', 'user_id');
    }

    function ProfessionalLink() {
        return $this->hasOne('App\Models\Entities\ProfessionalLink', 'user_id');
    }
}