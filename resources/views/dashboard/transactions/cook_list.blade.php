@extends('layouts.dashboard')
@section('title')
    لیست سفارشات
@endsection
@section('content')

	@if ($items->count())

        <div class="tile">

            <div class="table-responsive-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> غذا یا محصول </th>
                            <th> هزینه </th>
                            <th> تعداد </th>
                            <th> قابل پرداخت </th>
                            <th> سهم آشپز </th>
                            <th> تاریخ تحویل </th>
                            <th> تسویه شده </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $i => $item)
                            <tr>
                                <th> {{$i+1}} </th>
                                <td> <a href="{{$item->food->public_link()}}" target="_blank">{{$item->food->title}}</a> </td>
                                <td class="calibri"> {{nf($item->cost)}} </td>
                                <td class="calibri"> {{$item->count}} </td>
                                <td class="calibri"> {{nf($item->payable)}} </td>
                                <td class="calibri"> {{nf($item->cook_share)}} </td>
                                <td>
                                    {{date_picker_date($item->transaction->delivery)}}
                                    <br>
                                    ساعت {{$item->transaction->time}}
                                </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $item->cook_ponied]) </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    @else
        <div class="tile">
            <div class="alert alert-warning m-0">
                موردی یافت نشد.
            </div>
        </div>
    @endif

@endsection
