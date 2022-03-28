<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Family extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'gender', 'family_id'];

    public function Childs(): HasMany
    {
        return $this->hasMany(Family::class);
    }

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(Family::class, 'family_id', 'id');
    }

    public function GrandFather(): BelongsTo
    {
        return $this->Parent->Parent();
    }

    public function scopeGrandChilds($q)
    {
        return $q->whereIn('family_id', $this->Childs->pluck('id')->toArray());
    }

    public function scopeFemaleGrandChilds($q)
    {
        return $q->GrandChilds()->Gender('Female');
    }

    public function scopeMaleGrandChilds($q)
    {
        return $q->GrandChilds()->Gender('Male');
    }

    public function scopeGender($q, $gender)
    {
        return $q->whereGender($gender);
    }

    public function scopeAunts($q)
    {
        return $q->where('family_id', $this->Parent->Parent->id)->Gender('Female');
    }

    public function scopeUncles($q)
    {
        return $q->where('family_id', $this->Parent->Parent->id)->Gender('Male');
    }

    public function Cousins()
    {
        return $this->GrandFather->GrandChilds()
            ->where('id', '!=', $this->id);
    }

    public function scopeMaleCousins()
    {
        return $this->Cousins()->Gender('Male');
    }

    public function FemaleCousins()
    {
        return $this->Cousins()->Gender('Female');
    }

    public function allChilds()
    {
        return $this->Childs()->with('allChilds');
    }
}
