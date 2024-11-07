<?php

namespace App\Core\Notifications\Services;

use App\Events\SendNotification;
use App\Events\SendPrivateNotification;
use App\Core\Architecture\Abstracts\AbstractService;
use App\Core\Notifications\Repositories\NotificationRepository;
use App\Traits\Common;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationService extends AbstractService
{
    use Common;

    public function __construct(NotificationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeSave(array $params): array
    {
        $payload = [
            'user_id' => $params['user_id'] ?? null,
            'type_notification' => $params['type_notification'],
            'processed' => $params['processed'] ?? 1,
            'title' => $params['title'],
            'content' => $params['content'],
            'automatic' => $params['automatic'] ?? 0,
            'action_id' => $params['action_id'] ?? null,
            'scheduled' => $params['scheduled'] ?? null
        ];

        return $payload;
    }

    public function afterSave($entity, array $params)
    {
        if($entity->scheduled) return; // Notificação agendada será processado por outro serviço (job)

        match ($entity->type_notification) {
            'all' => broadcast(new SendNotification($entity->title, $entity->content))->toOthers(),
            'many' => broadcast(new SendPrivateNotification($entity)),
            default => null,
        };
    }

    public function listNotifications(Array $params): array
    {
        $this->addUserIDInParams($params);

        $notifications = $this->repository->getNotifications($params);

        return $notifications;
    }

    public function markAsViewed(Array $params) {
        $this->addUserIDInParams($params);

        $markAsViewed = $this->repository->markAsViewed($params);

        return $markAsViewed;
    }

    private function addUserIDInParams (&$params) {
        $params['userID'] = auth()->user()->id;
    }
}
