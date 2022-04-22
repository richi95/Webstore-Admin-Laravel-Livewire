@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Tagok módosítása') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Vezérlőpult') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.members.list')}}">{{ __('Tagok') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Tagok módosítása') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.message')
                <div x-data="{ tab: 'shipping_open', tab: 'billing_open', tab: 'account_open' }" class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'account_open' }"
                                x-on:click.prevent="tab = 'account_open'" style="cursor: pointer;">Fiók</li>
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'billing_open' }"
                                x-on:click.prevent="tab = 'billing_open'" style="cursor: pointer;">Számlázási adatok
                            </li>
                            <li class="list-group-item custom-list" :class="{ 'active': tab === 'shipping_open' }"
                                x-on:click.prevent="tab = 'shipping_open'" style="cursor: pointer;">Szállítási adatok</li>
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
@endsection
