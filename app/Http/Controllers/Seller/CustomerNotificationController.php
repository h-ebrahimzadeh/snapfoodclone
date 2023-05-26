<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StatusOrder;
use App\Models\User;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class CustomerNotificationController extends Controller
{
    public function sendCustomerNotification(User $user, Order $order)
    {
//        $statusOrder = StatusOrder::find($statusId)->first();


        $customerData = [
            'body' => 'you status order' . ' ' . $order->status_order,
            'text' => 'you can show status in snapfood',
            'url' => url('/'),
            'thankyou' => 'thank you'
        ];

        Notification::send($user, new CustomerNotification($customerData));
    }
}
