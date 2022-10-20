<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function getUser($id)
    {
        $user = User::where('id', $id)->withSum('orders', 'price_per_unit')
            ->findOrFail($id);
        return $user;
    }
    public function show($id)
    {
        $user = $this->getUser($id);
        $pdf = Pdf::loadView('test', compact('user'));
        return $pdf->stream('invoice.pdf');
    }

    public function download($id)
    {
        $user = $this->getUser($id);
        $pdf = Pdf::loadView('test', compact('user'));
        return $pdf->download('invoice.pdf');
    }
}
