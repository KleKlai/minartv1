<?php

namespace App\Model\Utilities;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class FAQ extends Model
{
    protected $guarded = [
        'id', 'uuid', 'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
