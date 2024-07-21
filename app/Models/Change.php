<?php

namespace App\Models;

use App\Observers\ChangeObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ChangeObserver::class)]
class Change extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'closed_at' => 'datetime',
        ];
    }

    /**
     * Assess if the change is closed.
     */
    protected function isClosed(): Attribute
    {
        return Attribute::make(
            get: fn () => ! blank($this->closed_at),
        );
    }

    /**
     * Assess if the change is open.
     */
    protected function isOpen(): Attribute
    {
        return Attribute::make(
            get: fn () => blank($this->closed_at),
        );
    }

    /**
     * Scope a query to only include closed changes.
     */
    public function scopeClosed(Builder $query): void
    {
        $query->whereNotNull('closed_at');
    }

    /**
     * Scope a query to only include open changes.
     */
    public function scopeOpen(Builder $query): void
    {
        $query->whereNull('closed_at');
    }
}
