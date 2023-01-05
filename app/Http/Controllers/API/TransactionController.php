<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Transactionitem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');

        if ($id) {
            $transaction = Transaction::with(['items.product'])->find($id);

            if ($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    'Data transaksi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
        }

        $transaction = Transaction::with(['items.product'])->where('users_id', Auth::user()->id);

        if ($status)
            $transaction->where('status', $status);

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout(Request $request)
    {
        $dates = Carbon::now()->format('Y-m-d');
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:food,id',
            'namapemesan' => 'required',
            'meja' => 'required',
            'total' => 'required',
            'status' => 'required|in:PENDING,ON_DELIVERY,DELIVERED,CANCEL,',
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'namapemesan' => $request->namapemesan,
            'tgl' => $dates,
            'meja' => $request->meja,
            'total' => $request->total,
            'status' => $request->status
        ]);

        foreach ($request->items as $food) {
            TransactionItem::create([
                'user_id' => Auth::user()->id,
                'food_id' => $food['id'],
                'transaction_id' => $transaction->id,
                'quantity' => $food['quantity'],
            ]);
        }

        return ResponseFormatter::success($transaction->load('items.food',), 'Transaksi berhasil',);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return ResponseFormatter::success($transaction, 'Transaksi berhasil diperbarui');
    }
}
