@extends('layouts.dashboard')
@section('title')
    لیست پرداختی ها
@endsection
@section('content')

	<div class="tile">

        @if ($payments->count())
            <div class="table-responsive-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> پرداخت شده به </th>
                            <th> نوع فعالیت </th>
                            <th> مبلغ </th>
                            <th> تاریخ </th>
                            <th> ساعت </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $i=> $payment)
                            <tr>
                                <th> {{$i+1}} </th>
                                <td> <a href="{{$payment->owner->dashboard_link()}}"> {{$payment->owner->full_name()}} </a> </td>
                                <td> {{$payment->type}} </td>
                                <td> <span class="calibri">{{nf($payment->amount)}}</span> تومان </td>
                                <td> {{human_date($payment->created_at)}} </td>
                                <td> {{$payment->created_at->format('H:i')}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning">
                موردی یافت نشد
            </div>
        @endif

    </div>

@endsection
