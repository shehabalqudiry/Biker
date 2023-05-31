<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class SearchWallet extends Component
{
    public $q, $data;

    public function updated()
    {
        $this->data['last_operations'] = request()->user()->wallet->payments()->where('value', "LIKE", "%$this->q%")->latest()->get();
    }
    public function render()
    {
        $this->data['balance'] = request()->user()->wallet->balance ?? "0";
        if (!$this->q) {
            # code...
            $this->data['last_operations'] = Payment::where('wallet_id', request()->user()->wallet->id)->latest()->get();
        }
        return view('livewire.search-wallet');
    }
}
