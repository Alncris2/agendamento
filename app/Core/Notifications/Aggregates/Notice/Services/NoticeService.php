<?php 

namespace App\Core\Notifications\Aggregates\Notice\Services;

use App\Core\Notifications\Aggregates\Notice\Repositories\NoticeRepository;
use App\Core\Architecture\Abstracts\AbstractService;

class NoticeService extends AbstractService
{
    public function __construct(NoticeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeSave(array $params): array
    {
        return [
            'user_id' => $params['user_id'] ?? null,
            'title' => $params['title'],
            'content' => $params['content'],
        ];
    }

    public function dispatchToEachUser(array $params): bool
    {
        $chunkSize = 15; 
        collect($params['belongsTo'])->chunk($chunkSize)->each(function ($chunk) use ($params) {
            foreach ($chunk as $userID) {
                $notice = [
                    'title' => $params['title'],
                    'content' => $params['content'],
                    'user_id' => $userID,
                ];

                $this->save($notice);
            }
        });

        return true;
    }

    public function dispatchToAll(array $params): bool
    {
        $notice = [
            'title' => $params['title'],
            'content' => $params['content'],
        ];

        $this->save($notice);

        return true;
    }
}