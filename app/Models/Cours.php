<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Certification;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cours extends Model
{
    use HasFactory;
    protected $with= [
        'category'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilters(Builder $query , array $filters){
        if(isset($filters['search'])){
            $query->where(fn (Builder $query)=>$query
            ->where('title','LIKE','%'.$filters['search'].'%')
            ->orwhere('content','LIKE','%'.$filters['search'].'%')
        );

        }
        if(isset($filters['category'])){
            $query->where(
            'category_id',$filters['category']->id ?? $filters['category']
            );
        }

    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

 public function comments():HasMany
{
    return $this->hasMany(Comment::class);
}

public function certifications()
{
    return $this->hasMany(Certification::class);
}

}
