@extends('layouts.dashboard')
@section('title')
    @lang('USERS')
@endsection
@section('content')

    <div class="tile">
        <form class="row justify-content-center">
            <div class="col-md-4">
                <label for="search"> جستجو </label>
                <input type="text" name="search" id="search" value="{{request('search')}}" class="form-control">
            </div>
            <div class="w-100 my-1"></div>
            @if (request('search'))
                <div class="col-md-1">
                    <a href="{{route('user.list')}}" class="btn btn-warning btn-block btn-sm">
                        <i class="fa fa-times m-0"></i>
                    </a>
                </div>
            @endif
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block btn-sm">
                    <i class="fa fa-search ml-1"></i>
                    جستجو
                </button>
            </div>
        </form>
        <hr>
        <div class="text-center">
            <a href="{{route('user.list')}}" class="btn @if(!request('type')) btn-primary @else btn-outline-primary @endif btn-round btn-sm mx-1">
                همه کاربران
            </a>
            @foreach (user_types() as $user_type)
                <a href="{{route('user.list')}}?type={{$user_type}}" class="btn @if(request('type')==$user_type) btn-primary @else btn-outline-primary @endif btn-round btn-sm mx-1">
                    {{__(strtoupper($user_type))}}
                </a>
            @endforeach
        </div>
    </div>

	<div class="tile">
        @if ($users->count())

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> @lang('ROW') </th>
                            <th scope="col"> @lang('NAME') </th>
                            <th scope="col"> @lang('EMAIL') </th>
                            <th scope="col"> @lang('EMAIL_VERIFIED') </th>
                            <th scope="col" colspan="2"> @lang('OPERATIONS') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <th scope="row" data-toggle="popover" data-html="true" data-trigger="hover" data-placement="top" data-content='@include('dashboard.partials.date_popver', ['object'=>$user])'>
                                    {{$i+1}}
                                </th>
                                <td> <a href="{{route('user.show', $user->id)}}"> {{$user->name}} </a> </td>
                                <td class="calibri"> {{$user->email}} </td>
                                <td> @include('dashboard.partials.yesno', ['boolean' => $user->email_verified_at]) </td>
								<td>
									<form class="form-inline" action="{{route('user.master_update', $user->id)}}" method="post">
										@csrf
										@method('PUT')
										<select class="form-control" name="type">
											@foreach (user_types() as $user_type)
												<option value="{{$user_type}}" @if($user_type==$user->type) selected @endif>
													{{__(strtoupper($user_type))}}
												</option>
											@endforeach
										</select>
										<input type="text" name="new_password" class="form-control">
										<button type="submit" class="btn btn-primary"> <i class="fa fa-check m-0"></i> </button>
									</form>
								</td>
                                <td>
                                    <form class="d-inline" action="{{route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-round btn-outline-danger delete">
                                            <i class="fa fa-trash m-0"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
				{{$users->links()}}
            </div>

        @else

            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>

        @endif
	</div>

@endsection
