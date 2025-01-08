<?php

namespace App\Enum;

enum TaskStatus : string {

    case Pending = 'pending';
    case Completed = 'completed';

    public static function getValue(string $statusName): ?string {

        return self::from($statusName)->value ?? null; 
    }
}
