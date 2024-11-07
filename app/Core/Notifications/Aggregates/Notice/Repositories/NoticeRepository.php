<?php 

namespace App\Core\Notifications\Aggregates\Notice\Repositories;

use App\Models\Notifications\Notices;
use App\Models\Notifications\NoticesViewed;
use App\Core\Architecture\Abstracts\AbstractRepository;

class NoticeRepository extends AbstractRepository
{
    public function __construct(Notices $model)
    {
        $this->model = $model;
    }

    public function listNotices(Int $take, Int $offset = 0){
        $notices = $this->model->select([
                'notices.id',
                'notices.title', 
                'notices.content',
                'notices.created_at',
                'notices_viewed.id as viewed_id',
            ])
            ->where('notices.user_id', auth()->user()->id)
            ->orWhere('notices.user_id', NULL)
            ->leftJoin('notices_viewed', function($join){
                $join->on('notices_viewed.notice_id', 'notices.id')
                    ->where('notices_viewed.user_id', auth()->user()->id);
            })
            ->take($take)
            ->offset($offset)
            ->limitFromAccountCreation()
            ->orderBy('notices.created_at', 'desc')
            ->get();

        return $notices;
    } 

    public function markNoticeAsRead($noticeID) {
        $noticesViewed = NoticesViewed::firstOrCreate([
            'notice_id' => $noticeID,
            'user_id' => auth()->user()->id
        ]);

        $remainToView = $this->getRemainToView();

        return $remainToView;
    }

    public function getRemainToView() {
        $totalNoticesSended = $this->model->where('notices.user_id', auth()->user()->id)
            ->orWhere('notices.user_id', NULL)
            ->limitFromAccountCreation()
            ->count();

        $totalNoticesViewed = NoticesViewed::where('user_id', auth()->user()->id)->count(); 

        $qtyToView = $totalNoticesSended - $totalNoticesViewed;

        return $qtyToView;
    }
}
