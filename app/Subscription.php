<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
 
    
public $timestamps = false;
/**
 * The database table used by the model.
 *
 * @var string
 */
protected $table = 'subscription_user';

/**
 * Attributes that should be mass-assignable.
 *
 * @var array
 */
protected $fillable = ['user_id', 'user_delivery_address', 'contact_number', 'contact_person_name', 'status'];

/**
 * The attributes excluded from the model's JSON form.
 *
 * @var array
 */
protected $hidden = [];

/**
 * The attributes that should be casted to native types.
 *
 * @var array
 */
protected $casts = [];

/**
 * The attributes that should be mutated to dates.
 *
 * @var array
 */
protected $dates = [];

}
