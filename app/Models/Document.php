<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Define which fields are mass assignable
    protected $fillable = [
        'number',
        'title',
        'amount',
        'received_from',
        'sum',
        'purpose',
        'location',
        'date',
    ];}
