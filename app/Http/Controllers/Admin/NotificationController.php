<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class NotificationController extends Controller
{
    public function index()
    {
      
        if (request('type') == "unread") {
            $notifications =  auth()->user()->unreadNotifications;
        }
        elseif (request('type') == "all") {
            $notifications =  auth()->user()->notifications;
        }
        elseif (request('type') == "read") {
            $notifications =  auth()->user()->readNotifications;
        }
        else{
            $notifications =  auth()->user()->notifications;

        }

        return view('admin.notifications.index', compact('notifications'));
    }
    public function markAllAsRead()
    {
        $notification_ids = array();

        //push notification ids in notification_ids array
        foreach (auth()->user()->notifications as $notification) {
            array_push($notification_ids, $notification->id);
        }

        auth()->user()->notifications->whereIn('id', $notification_ids)->markAsRead();
        return back()->with('success', 'All Notifications read');
    }
}
