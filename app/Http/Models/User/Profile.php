<?php

namespace App\Http\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['user_name','email','national_code','birthday'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
