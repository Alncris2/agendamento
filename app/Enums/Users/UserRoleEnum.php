<?php

namespace App\Enums\Users;

enum UserRoleEnum: int
{
    case User = 1;
    case Custumer = 2;
    case Admin = 3;

    public static function getDescription(int $role): string
    {
        return match ($role) {
            self::User->value => 'Usuário',
            self::Custumer->value => 'Cliente',
            self::Admin->value => 'Administrador',
            default => 'Desconhecido',
        };
    }
}
