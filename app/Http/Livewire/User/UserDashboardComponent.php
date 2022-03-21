<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    public function render()
    {   
        $orders =Order::orderBy('created_at','DESC')->Where('user_id',Auth::user()->id)->get()->take(10);
        $totalCost =Order::Where('status','!=','canceled')->where('user_id',Auth::user()->id)->sum('total');
        $totalPurchase =Order::Where('status','!=','canceled')->where('user_id',Auth::user()->id)->count();
        $totalDeliverd =Order::Where('status','delivered')->where('user_id',Auth::user()->id)->count();
        $totalCanceled =Order::Where('status','canceled')->where('user_id',Auth::user()->id)->count();
        return view('livewire.user.user-dashboard-component',[
            'orders' =>$orders,
            'totalCost' =>$totalCost,
            'totalPurchase' => $totalPurchase,
            'totalDeliverd' => $totalDeliverd,
            'totalCanceled' =>$totalCanceled
        ])->layout('layouts.base');
    }
}
