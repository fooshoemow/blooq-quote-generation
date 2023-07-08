<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';
    protected $fillable = ['title', 'client_id', 'status_id', 'currency', 'number'];

    protected static function booted() {
        static::creating(function ($quote) {
            $quote->number = 'QT-' . str_pad(static::count() + 1, 5, "0", STR_PAD_LEFT);
        });
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function lineItems() {
        return $this->HasMany(LineItem::class, 'quote_id', 'id');
    }
}
