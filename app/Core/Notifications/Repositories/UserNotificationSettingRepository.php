<?php 

namespace App\Core\Notifications\Repositories;

use App\Core\Architecture\Abstracts\AbstractRepository;
use App\Models\Notifications\UserNotificationSetting;

class UserNotificationSettingRepository extends AbstractRepository
{
    public function __construct(UserNotificationSetting $model)
    {
        $this->model = $model;
    }
}