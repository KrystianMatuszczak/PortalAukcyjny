<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Shipment;
use App\Models\Condition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'amount',
        'localization',
        'image',
        'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class);
    }

    public function shipments()
    {
        return $this->belongsToMany(Shipment::class);
    }

    protected function image(): Attribute{
        return Attribute::make(
            get: function ($value)
            {
            if($value === null)
            {
                return null;
            }      
            return config('filesystems.images_dir')
                . '/' . $value;
            },
        );
    }

    public function imageUrl(): String{
        return $this->imageExists()
            ? Storage::url($this->image)
            : Storage::url(config('app.no_image'));
    }

    public function imageExists(): bool{
        return $this->image !== null    
            && Storage::disk('public')->exists($this->image);
    }

    public function cost(int $qty): float
    {
        return $this->price * $qty;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
