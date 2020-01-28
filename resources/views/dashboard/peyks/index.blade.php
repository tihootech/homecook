@extends('layouts.dashboard')
@section('title')
    مدیریت پیک ها
@endsection
@section('content')

	<div class="tile">
        <div class="container">
            <div class="table-responsive-lg">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> نام پیک </th>
                            <th> شماره تماس </th>
                            <th colspan="2"> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peyks as $i => $peyk)
                            <tr>
                                <th> {{$i+1}} </th>
                                <td> {{$peyk->full_name()}} </td>
                                <td> {{$peyk->mobile}} </td>
                                <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ویرایش">
                                    <a href="{{route('peyk.edit', $peyk->id)}}" class="btn btn-link text-success">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </td>
                                <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="حذف">
                                    <form class="d-inline" action="{{route('peyk.destroy', $peyk->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-link text-danger delete">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</div>

@endsection
