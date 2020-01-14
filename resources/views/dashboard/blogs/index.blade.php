@extends('layouts.dashboard')
@section('title')
    مدیریت وبلاگ
@endsection
@section('content')

    <div class="tile text-center">
        <a href="{{route('blog.create')}}" class="btn btn-primary">
            <i class="fa fa-plus ml-2"></i>
            بلاگ جدید
        </a>
    </div>

	<div class="tile">
        @if ($blogs->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> ردیف </th>
                        <th scope="col"> عنوان </th>
                        <th scope="col"> بازدید </th>
                        <th scope="col"> محتوا </th>
                        <th scope="col" colspan="3"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $i => $blog)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td> <a href="{{$blog->public_link()}}" target="_blank"> {{$blog->title}} </a> </td>
                            <td> {{nf($blog->seens)}} </td>
                            <td> {{short($blog->content, 50)}} </td>
                            <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ویرایش">
                                <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-link text-success">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                            <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="حذف">
                                <form class="d-inline" action="{{route('blog.destroy', $blog->id)}}" method="post">
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

            {{$blogs->appends($_GET)->links()}}

        @else
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                موردی یافت نشد.
            </div>
        @endif
	</div>

@endsection
