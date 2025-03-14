<?php

namespace App\Http\Controllers\services\v1\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class UserNotificationController extends Controller
{
    function NotificationList() {
        $user = Auth::user();
        $notifications = Notification::get();
        return response()->json([
            'success' => true,
            'notifications' => $notifications,
        ], 200);
    }
}
