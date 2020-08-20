<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Tour;

class DashboardController extends Controller
{
    public $title = 'Панель администратора';


    public function index()
    {
        return view('admin::pages.dashboard.index', [
            'title' => $this->title,
            'title_page' => 'Виджеты',
            'cnt_not_auth_users' => '$cnt_not_auth_users',
            'all_users' => '$all_users',
            'all_events' => '$all_events',
            'requests_auth' => '$requests_auth',
            'new_tours' => '$new_tours',
            'recommended' => '$recommended'
        ]);
    }

}
