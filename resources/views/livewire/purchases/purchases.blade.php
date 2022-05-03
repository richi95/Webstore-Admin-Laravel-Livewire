<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            @include('admin.includes.message')
            @include('livewire.purchases.edit')
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{ __('Vásárlások') }}</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('Vezérlőpult') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Vásárlások') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-4 d-inline-flex">
                                <label class="d-flex" style="gap:20px; align-items:center;" for="pag_purchases">
                                    Mutat
                                    <select class="custom-select" wire:model="per_page">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </label>
                            </div>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" class="form-control float-right" placeholder="Keresés" wire:model="search">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Megrendelő neve</th>
                                        <th>Megrendelő email címe</th>
                                        <th>Fizetési mód</th>
                                        <th>Szállítási mód</th>
                                        <th>Státusz</th>
                                        <th>Összesen</th>
                                        <th>Létrehozva</th>
                                        <th>Számla</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="custom-tbody">

                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{ $purchase->customer_name }}</td>
                                            <td>{{ $purchase->customer_email }}</td>
                                            <td>{{ $purchase->payment_method }}</td>
                                            <td>{{ $purchase->shipping_method }}</td>
                                            <td><span class="dot-{{ $purchase->status }}"></span></td>
                                            <td>{{ $purchase->amount }}</td>
                                            <td>{{ $purchase->created_at }}</td>
                                            <td><a
                                                    href="{{ url('/storage/' . $purchase->bill) }}">{{ isset($purchase->bill) ? 'Link' : '' }}</a>
                                            </td>
                                            <td id="custom-action">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#updatePurchaseModal"
                                                    wire:click.prevent="edit({{ $purchase->id }})">
                                                    Módosít
                                                </button>
                                                <button onclick=" confirm('Biztosan törli?') " type="button"
                                                    class="btn btn-danger"
                                                    wire:click.prevent="delete({{ $purchase->id }})">
                                                    Törlés
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $purchases->links('vendor.livewire.bootstrap') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
