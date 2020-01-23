@extends('layouts.dashboard')
@section('title')
    مدیریت اسلاید ها
@endsection
@section('content')

	@foreach ($slides_list as $page => $slides)

        <div class="tile">
            <div class="container">

    			<h3> <i class="material-icons">photo</i> مدیریت اسلاید های "<span class="text-info"> {{$pages[$page]}} </span>" </h3>
    			<hr>

                @if ($slides->count())
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> عنوان </th>
                                    <th> زیرعنوان </th>
                                    <th> عبارت انگلیسی </th>
                                    <th> تصویر </th>
                                    <th colspan="2"> عملیات </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $i => $slide)
                                    <tr>
                                        <th>{{$i+1}}</th>
                                        <td> {{$slide->title ?? '-'}} </td>
                                        <td> {{$slide->subtitle ? short($slide->subtitle) : '-'}} </td>
                                        <td> {{$slide->english_word ?? '-'}} </td>
                                        <td align="center">
                                            <a href="javascript:void" data-toggle="popover" data-placement="right" data-html="true"
                                            data-content="<img src='{{asset($slide->path)}}' style='max-height:300px;width:100%'>"
                                            >
                                                <i class="material-icons mt-2">photo</i>
                                            </a>
                                        </td>
                                        <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ویرایش">
                                            <a href="{{route('slides.edit', $slide->id)}}" class="btn btn-link text-success">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </td>
                                        <td data-toggle="popover" data-trigger="hover" data-placement="top" data-content="حذف">
                                            <form class="d-inline" action="{{route('slides.destroy', $slide->id)}}" method="post">
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
                @else
                    <div class="alert alert-warning">
                        بدون اسلاید
                    </div>
                @endif

                <p class="lead">
                    <a href="#new-{{$page}}" data-toggle="collapse"> <i class="fa fa-plus ml-1"></i> اسلاید جدید </a>
                </p>
                <form class="collapse" action="{{route('slides.store')}}" method="post" enctype="multipart/form-data" id="new-{{$page}}">

                    @csrf
                    <input type="hidden" name="page" value="{{$page}}">

                    @include('includes.slide_form', ['slide'=> new \App\Slide])

                </form>

            </div>
        </div>

    @endforeach

@endsection
