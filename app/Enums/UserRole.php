<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum UserRole: string implements HasColor, HasLabel
{
    case Admin = 'admin';
    case Editor = 'editor';
    case User = 'user';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Admin => 'success',
            self::Editor => 'info',
            self::User => 'gray',
        };
    }

    public function getLabel(): ?string
    {
        return Str::title($this->name);
    }
}
