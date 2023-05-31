<?php

namespace App\Http\Livewire;

use App\Models\Shipment;
use Livewire\Component;

class SearchMyShipment extends Component
{
    public $q, $outgoing, $incoming;

    public function updated()
    {
        if ($this->incoming) {
            $this->incoming = Shipment::where('shipment_consignee_id', auth()->user()->number)->where('shipment_number', "LIKE", "%$this->q%")->latest()->get();
        }elseif($this->outgoing){
            $this->outgoing = Shipment::where('user_id', auth()->user()->id)->where('shipment_number', "LIKE", "%$this->q%")->latest()->get();
        }
    }
    public function render()
    {
        if (!$this->q) {
            if ($this->incoming) {
                $this->incoming = Shipment::where('shipment_consignee_id', auth()->user()->number)->latest()->get();
            }elseif($this->outgoing){
                $this->outgoing = Shipment::where('user_id', auth()->user()->id)->latest()->get();
            }
        }
        return view('livewire.search-my-shipment');
    }
}
