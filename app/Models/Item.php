<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     use HasFactory;
    /**
     * Pagination Limit variable
     *
     * @var integer
     */
    protected $perPage=10;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];
    /**
     * Casts variable
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        // 'created_at' => 'datetime:m-d-Y g:i A', @Use Cast Or Set And Get Like Down
        // 'updated_at' => 'datetime:m-d-Y g:i A', @Use Cast Or Set And Get  Like Down
    ];
    /**
     * Item Name Attribute function
     *
     * @return Attribute
     */
    protected function itemName(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => ucfirst($value),
           set: fn ($value) => strtolower($value),
        );
    }

     /**
     * Item Price Attribute function
     *
     * @return Attribute
     */
    protected function price(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => round($value,2),
           set: fn ($value) => round($value,2),
        );
    }

     /**
     * Item Description Attribute function
     *
     * @return Attribute
     */
    protected function description(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => ucfirst($value),
           set: fn ($value) => $value,
        );
    }

    /**
     * Item Status Attribute function
     *
     * @return Attribute
     */
    protected function isActive(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => (boolean)$value,
           set: fn ($value) => $value,
        );
    }

     /**
     * Create At Attribute function
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m-d-Y g:i A'),
        );
    }
      /**
     * Create At Attribute function
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('m-d-Y g:i A'),
        );
    }
   

}
