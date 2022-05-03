<?php

namespace App\Http\Livewire\Views;

use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Purchases extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    public $per_page = 2;
    public $ids;
    public $customer_name;
    public $status;
    public $bill;

    public $search = '';

    public function resetInputFields()
    {
        $this->ids = '';
        $this->customer_name = '';
        $this->status = '';
        $this->bill = '';
    }

    public function edit($ids)
    {
        $purchase = Purchase::where('id', $ids)->first();
        $this->ids = $purchase->id;
        $this->customer_name = $purchase->customer_name;
        $this->status = $purchase->status;
        $this->bill = $purchase->bill;
    }

    public function update($ids)
    {
        $validated = $this->validate([
            'customer_name' => 'required',
            'status' => 'required',
            'bill' => 'required|mimes:doc,docx,pdf'
        ]);

        $bill = $this->bill->store('bills');
        $validated['bill'] = $bill;

        Purchase::find($ids)->update($validated);
        session()->flash('message', 'A vásárlás sikeresen módosításra került.');
        $this->emit('purchaseUpdated');
    }

    public function delete($ids)
    {
        Purchase::where('id', $ids)->first()->delete();
        session()->flash('message', 'A vásárlás sikeresen törlésre került.');
    }

    public function render()
    {
        return view('livewire.purchases.purchases', [
            'purchases' => Purchase::search('customer_name', $this->search)->paginate($this->per_page)
        ]);
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
}
