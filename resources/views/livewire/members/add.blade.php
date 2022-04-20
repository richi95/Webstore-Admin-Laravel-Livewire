{{-- @extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div x-data="{ tab: 'account_open', tab: 'billing_open', tab: 'shipping_open' }" class="row mt-5">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'account_open' }"
                                x-on:click.prevent="tab = 'account_open'" style="cursor: pointer;">Cras justo odio</li>
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'billing_open' }"
                                x-on:click.prevent="tab = 'billing_open'" style="cursor: pointer;">Dapibus ac facilisis in
                            </li>
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'shipping_open' }"
                                x-on:click.prevent="tab = 'shipping_open'" style="cursor: pointer;">Morbi leo risus</li>
                        </ul>

                    </div>
                    <div x-show="tab === 'account_open'" class="col-md-9">
                        @include('admin.members.cards.account')
                    </div>
                    <div x-show="tab === 'billing_open'" class="col-md-9">
                        @include('admin.members.cards.billing')
                    </div>
                    <div x-show="tab === 'shipping_open'" class="col-md-9">
                        @include('admin.members.cards.shipping')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection --}}
