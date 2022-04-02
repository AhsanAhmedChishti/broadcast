<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notf_count($id)
    {
        $data = UserNotification::where('user_id', '=', $id)->where('is_read', '=', 0)->get()->count();
        return response()->json($data);
    }

    public function notf_clear($id)
    {
        $data = UserNotification::where('user_id', '=', $id);
        $data->delete();
    }

    public function notf_show($id)
    {
        $datas = UserNotification::where('user_id', '=', $id)->get();
        if ($datas->count() > 0) {
            foreach ($datas as $data) {
                $data->is_read = 1;
                $data->update();
            }
        }
        return view('seller.notification.notf', compact('datas'));
    }
}
