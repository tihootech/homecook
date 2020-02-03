@extends('layouts.dashboard')
@section('title')
    سفارش با شناسه {{$transaction->uid}}
@endsection
@section('content')

    <div class="tile">
        <h4 class="mb-2"> لیست سفارشات  </h4>
        <p class="text-info">
            <i class="fa fa-asterisk"></i>
            اگر سهم آشپز با قرمز نوشته شده باشد، یعنی سهم او پرداخت نشده است.
            اگر با سبز نوشته شده باشد، یعنی پرداخت شده.
        </p>
        <div class="table-responsive-lg">
            @include('includes.cart_items', ['no_action'=>true, 'in_panel'=>true])
        </div>
    </div>

@endsection
