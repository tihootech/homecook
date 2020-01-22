@extends('layouts.dashboard')
@section('title')
    مدیریت دسته بندی ها
@endsection
@section('content')

	<div class="tile">
        <div class="container">
            <div class="row">

                @foreach ($types as $type)

                    <div class="col-md-6">
                        <h3>
                            دسته بندی های مربوط به
                            {{$type == 'food' ? 'غذا ها' : 'محصولات خانگی'}}
                        </h3>
                        <hr>

                        @foreach ($$type as $i => $cat)

                            <div class="row">
                                @csrf
                                @method('PUT')

                                <div class="col-12 col-lg-8">
                                    <p> {{$i+1}} - {{$cat->title}} </p>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <a href="#edit-form-{{$cat->id}}" data-toggle="collapse" class="btn btn-outline-success btn-block">
                                        <i class="fa fa-edit m-0"></i>
                                    </a>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <form action="{{route('cat.destroy', $cat->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void" class="btn btn-outline-danger btn-block delete">
                                            <i class="fa fa-trash m-0"></i>
                                        </a>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <form class="collapse mt-4" action="{{route('cat.update', $cat->id)}}" method="post" id="edit-form-{{$cat->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="title" required value="{{$cat->title}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-outline-primary btn-block"> ویرایش </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <hr>

                        @endforeach

                        <form class="row" action="{{route('cat.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="{{$type}}">

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="new-{{$type}}"> <i class="fa fa-plus ml-1 text-info"></i> دسته بندی جدید </label>
                                    <input type="text" class="form-control" name="title" id="new-{{$type}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 align-self-center">
                                <button type="submit" class="btn btn-outline-primary btn-block mt-lg-2"> تایید </button>
                            </div>

                        </form>
                    </div>

                @endforeach

            </div>
        </div>
	</div>

@endsection
