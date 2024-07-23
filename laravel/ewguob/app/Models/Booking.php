<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'id',
        'destination_id',
        'booking_date',
        'travel_date',
        'status',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
