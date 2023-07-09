<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LineItem extends Model
{
    use HasFactory;

    protected $table = 'line_items';
    protected $fillable = [
        'supplier',
        'name',
        'description',
        'quantity',
        'currency_code',
        'amount',
        'quote_id',
    ];

    public function quote() {
        return $this->belongsTo(Quote::class, 'quote_id', 'id');
    }
}
