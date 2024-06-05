<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case VENDOR = 'vendor';
    case USER = 'user';

    public function description(): string
    {
        return match($this)
        {
            self::ADMIN => 'He\'s got full powers',
            self::USER => 'A classic user, with classic rights',
            self::VENDOR => 'Oh, a vendor, be nice to him!',
        };
    }
}
