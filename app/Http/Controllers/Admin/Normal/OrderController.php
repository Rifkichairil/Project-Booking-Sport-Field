<?php

namespace App\Http\Controllers\Admin\Normal;

use JsValidator;
use App\Http\Controllers\Controller;
use App\Model\OrderField;
use Illuminate\Http\Request;
use App\Repositories\OrderRepositories;
use Carbon\Carbon;

class OrderController extends Controller
{
    //
    public $user;

    protected $orderRepository;

    public function __construct(OrderRepositories $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $order = $this->orderRepository->get();

        return view('admin.pages.normal.order.index', compact('order'));
    }

    public function updateStatus($id)
    {
        $this->orderRepository->updateStatus($id);

        return redirect()->route('core.pesanan.index')->with('msg-success', 'Status berita telah diperbarui.');
    }

    // public function input()
    // {
    //     $kuesionerkelas = kuesionerKelas::get();

    //     return view('input', compact('kuesionerKelas'));
    // }
}
