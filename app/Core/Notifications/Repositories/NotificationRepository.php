<?php 

namespace App\Core\Notifications\Repositories;

use  App\Core\Architecture\Abstracts\AbstractRepository;
use App\Models\Notifications\Notification;
use App\Models\Notifications\NotificationViewers;
use Illuminate\Support\Facades\DB;

class NotificationRepository extends AbstractRepository
{
    public function __construct(Notification $model)
    {
        $this->model = $model;
    }

    public function getNotifications(Array $params): array
    { 
        try {
            $totalToView = $this->model->where([
                'notifications_center.processed' => 1,
                'notifications_center.user_id' => $params['userID']
            ])->count();

            $totalViewed = NotificationViewers::where('user_id', $params['userID'])->count();

            $remainToView = $totalToView - $totalViewed;

            $query = $this->model
                ->leftJoin('notification_viewers', 'notifications_center.id',    'notification_viewers.notification_id')
                ->select([
                        'notifications_center.id',
                        'notifications_center.title',
                        'notifications_center.content',
                        DB::raw('IF(notification_viewers.id IS NULL, 0, 1) as viewed'),
                        'notifications_center.type_notification',
                ])
                ->where([
                    'notifications_center.processed' => 1,
                    'notifications_center.user_id' => $params['userID']
                ])
                ->orWhere('notifications_center.type_notification', 'all')
                ->take($params['take'])
                ->offset($params['offset'])
                ->orderBy('notifications_center.created_at', 'DESC')
                ->get()
                ->toArray();    

            return [
                'remainToView' => $remainToView,
                'notifications' => $query
            ];

        } catch (\Throwable $th) {
            return [
                'message' => 'Erro ao listar notificações. Tente novamente.'
            ];
        }
    
    }

    public function markAsViewed(Array $params): array
    {    
        try {
            NotificationViewers::firstOrCreate([
                'user_id' => $params['userID'],
                'notification_id' => $params['notification_id']
            ]);

            return [
                'message' => 'Notificação visualizada com sucesso.'  
            ];

        } catch (\Throwable $th) {
            return [
                'message' => 'Erro ao visualizar notificação. Tente novamente.'
            ];
        }
    }
}
