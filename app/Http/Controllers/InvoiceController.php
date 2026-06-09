<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function download(Order $order)
    {
        if (auth()->id() !== $order->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $order->load('items', 'user');

        $pdf = Pdf::loadView('invoice.pdf', compact('order'));

        return $pdf->download('invoice-order-' . $order->id . '.pdf');
    }

}