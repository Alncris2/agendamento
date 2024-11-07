<?php

namespace App\Core\User\Validators;

use App\Traits\Common;
use App\Enums\Users\UserRoleEnum;
use Illuminate\Database\Eloquent\Model;

class DataUserValidator
{
    use Common;

    private array $params;

    private Model $entity;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->params['code'] ?? '',
            'name' => $this->params['name'] ?? '',
            'email' => $this->params['email'] ?? null,
            'email_verified' => $this->params['email_verified'] ?? false,
            'password' => $this->params['password'] ?? '',
            'picture' => $this->params['picture'] ?? null,
            'document' => self::sanitizeCpfCnpj($this->params['document'] ?? null),
            'phone' => self::sanitizePhone($this->params['phone'] ?? null),
            'phone_country' => $this->params['phone_country'] ?? 'br',
            'birth_date' => self::createDate($this->params['birth_date'] ?? ''),
            'zipcode' => $this->params['zipcode'] ?? null,
            'address' => $this->params['address'] ?? null,
            'number' => $this->params['number'] ?? null,
            'neighbourhood' => $this->params['neighbourhood'] ?? null,
            'complement' => $this->params['complement'] ?? null,
            'city' => $this->params['city'] ?? null,
            'state' => $this->params['state'] ?? null,
            'user_terms_accepted' => $this->params['user_terms_accepted'] ?? false,
            'user_full_registration' => $this->params['user_full_registration'] ?? false,
            'action' => $this->params['action'] ?? 'new-custumer',
            'role' => $this->setUserRole($this->params['action']),
        ];
    }

    private function setUserRole($action): string
    {
        return match ($action) {
            'update-custumer',
            'new-custumer' => UserRoleEnum::Custumer->value,
            'update-admin',
            'new-admin' => UserRoleEnum::Admin->value,
            default => UserRoleEnum::User->value,
        };
    }

}
