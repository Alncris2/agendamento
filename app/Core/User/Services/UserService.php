<?php

namespace App\Core\User\Services;

use App\Core\User\Repositories\UserRepository;
use App\Core\Architecture\Abstracts\AbstractService;
use App\Core\User\Validators\DataUserValidator;
use App\Enums\Users\UserRoleEnum;

class UserService extends AbstractService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeSave($params): array
    {
        return $this->preparePayloadToSave($params);
    }

    private function preparePayloadToSave(array $params): array
    {
        $dataUserValidator = new DataUserValidator($params);

        $payload = $dataUserValidator->toArray();

        return array_merge($params, $payload);
    }

    private function preparePayloadToUpdate(array $params): array
    {
        $mappings = [
            'email' => 'email',
            'password' => 'senha',
            'document' => 'documento',
            'phone' => 'phone',
            'phone_country' => 'phone_country',
            'birth_date' => [null, fn($value) => self::createDate($value)],
            'role' => ['action', fn($value) => $this->setUserRole($value)],
        ];

        foreach ($mappings as $key => $mapping) {
            $altKey = is_array($mapping) ? $mapping[0] : $mapping;
            $callback = is_array($mapping) ? $mapping[1] : null;

            if (isset($params[$key]) || ($altKey && isset($params[$altKey]))) {
                $value = $params[$key] ?? $params[$altKey];
                $params[$key] = $callback ? $callback($value) : $value;
            }
        }

        return $params;
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

    /**
     * @throws Exception
     */
    public function afterSave($entity, array $params)
    {
        switch ($params['action']) {
            case 'new-admin':
                $this->createOrUpdatePermissions($entity, $params);
            break;
            case 'new-custumer':
            case 'new-user':
                // code...
            break;
        }
    }

    public function afterUpdate($entity, array $params)
    {
        switch ($params['action'] ?? null) {
            case 'update-custumer':
            case 'update-user':
                // code...
            break;
            case 'update-admin':
                $this->createOrUpdatePermissions($entity, $params);
            break;
        }

        return $entity;
    }

    private function createOrUpdatePermissions($entity, $params): void
    {
        $permissionsToUser = $this->preparePermissions($params['permission-user']);
        $entity->syncPermissions($permissionsToUser);
    }

    private function preparePermissions(array $permissionsToUser): array
    {
        $permissions = $this->getArrayPermission();
        $permissionsArray = [];
        foreach ($permissions as $permission) {
            foreach ($permission->subCategories as $subCategory) {
                foreach ($subCategory->verbs as $verb => $checked) {
                    if (in_array($subCategory->value . '.' . $verb, $permissionsToUser)) {
                        $permissionsArray[] = $subCategory->value . '.' . $verb;
                    }
                }
            }
        }

        return $permissionsArray;
    }
}