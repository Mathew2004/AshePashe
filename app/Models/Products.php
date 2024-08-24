<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = ['company_id','name','description','price','image1','image2','image3','slug'];

    public function getCompanyIdAttribute($val)
    {
        $company = Company::where('id',$val)->first();
        return $company->name;
    }
    public function setCompanyIdAttribute($val)
    {
        $company = Company::where('name',$val)->first();
        $this->attributes['company_id'] = $company->id;
    }

    public function offers()
    {
        return $this->hasMany(Offers::class, 'product_id');
    }
    public function offer()
    {
        return $this->hasOne(Offers::class, 'product_id');
    }
    public function rating()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
