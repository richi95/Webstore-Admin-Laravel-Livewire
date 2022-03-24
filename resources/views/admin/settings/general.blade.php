@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Általános beállítások') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
              <li class="breadcrumb-item active">{{ __('Beállítások') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
 
          <div class="col-md-12">
   
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  @include('admin.includes.form.input',[
                      'id'=>'adminemail',
                      'label'=>'Adminisztrátori E-mail cím megadása',
                      'placeholder'=>'Admin e-mail',
                      'type'=>'email',
                      'value'=>'',
                      'params'=>null
                  ])
                  
                  @include('admin.includes.form.input',[
                    'id'=>'sender_email_name',
                    'label'=>'Kimenő E-mailek feladó neve',
                    'placeholder'=>'E-mailek feladó neve',
                    'type'=>'text',
                    'value'=>'',
                    'params'=>null
                ])

                @include('admin.includes.form.input',[
                    'id'=>'sender_email_address',
                    'label'=>'Kimenő E-mailek feladó e-mail',
                    'placeholder'=>'E-mailek feladó címe',
                    'type'=>'email',
                    'value'=>'',
                    'params'=>null
                ])

                @include('admin.includes.form.input',[
                    'id'=>'shop_name',
                    'label'=>'Webáruház neve',
                    'placeholder'=>'Webáruház neve',
                    'type'=>'text',
                    'value'=>'',
                    'params'=>null
                ])

                @include('admin.includes.form.input',[
                    'id'=>'vat',
                    'label'=>'ÁFA % megadása',
                    'placeholder'=>'ÁFA % megadása',
                    'type'=>'number',
                    'value'=>'',
                    'params'=>'min="0" max="99"'
                ])


                @include('admin.includes.form.input',[
                    'id'=>'currency',
                    'label'=>'Pénznem neve',
                    'placeholder'=>'Pénznem neve',
                    'type'=>'text',
                    'value'=>'',
                    'params'=> null
                ])

                @include('admin.includes.form.input',[
                    'id'=>'currency_simbol',
                    'label'=>'Pénznem szimbólum',
                    'placeholder'=>'Pénznem szimbólum',
                    'type'=>'text',
                    'value'=>'',
                    'params'=> null
                ])
                {{--  --}}

                @include('admin.includes.form.input',[
                    'id'=>'currency_round_precision',
                    'label'=>'Pénznem tizedespontossága',
                    'placeholder'=>'Pénznem tizedespontossága',
                    'type'=>'number',
                    'value'=>'',
                    'params'=> "max='3'"
                ])


                @include('admin.includes.form.input',[
                    'id'=>'products_per_page',
                    'label'=>'Termékszám / oldal',
                    'placeholder'=>'Termékszám / oldal',
                    'type'=>'number',
                    'value'=>'',
                    'params'=> null
                ])



                @include('admin.includes.form.input',[
                    'id'=>'discount_cupon_available_from',
                    'label'=>'Kedvezmény kupon efölötti vásárlás esetén generálódik',
                    'placeholder'=>'',
                    'type'=>'number',
                    'value'=>'',
                    'params'=> null
                ])


                @include('admin.includes.form.input',[
                    'id'=>'discount_cupon_percent',
                    'label'=>'Kedvezmény kupon engedményének %-a',
                    'placeholder'=>'Kedvezmény %',
                    'type'=>'number',
                    'value'=>'',
                    'params'=> null
                ])

                {{--  --}}

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
 

          </div>
 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection