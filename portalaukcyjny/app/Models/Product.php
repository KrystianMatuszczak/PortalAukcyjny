<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Shipment;
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
        'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
}
