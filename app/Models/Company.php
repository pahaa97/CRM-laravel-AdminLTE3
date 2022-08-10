<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['name', 'description', 'employees', 'user_id'];

    public function clients() {
        return $this->belongsToMany(Client::class);
    }
}
