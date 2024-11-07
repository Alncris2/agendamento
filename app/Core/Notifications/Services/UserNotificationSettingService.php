<?php 

namespace App\Core\Notifications\Services;

use App\Core\Architecture\Abstracts\AbstractService;
use App\Core\Notifications\Repositories\UserNotificationSettingRepository;

class UserNotificationSettingService extends AbstractService
{
    public function __construct(UserNotificationSettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(array $params = [], $with = [])
    {
        $userID = auth()->user()->id;

        return $this->repository->where(['user_id' => $userID], $with); 
    }

    public function beforeSave(array $params): array
    {
        $params['user_id'] = auth()->user()->id;
        return $params;
    }

    public function validateOnInsert(array $params): bool
    {
        $userID = auth()->user()->id;

        $notificationSetting = $this->repository->where(['user_id' => $userID, 'type' => $params['type']]);

        if ($notificationSetting->count() > 0) {
            return false;
        }

        return true;
    }
}