<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['name', 'contact_name', 'contact_email'];

    public function quotes() {
        return $this->hasMany(Quote::class, 'client_id', 'id');
    }
}
