@extends('layouts.dashboard')
@section('title')
    @if($comment->id) @lang('EDIT_COMMENT') @else @lang('FAKE_COMMENT') @endif
@endsection
@section('content')

    <div class="tile text-left">
        <a href="{{route('comment.index')}}" class="btn btn-primary btn-round">
            <i class="fa fa-list ml-2"></i>
            @lang('LIST_ALL') @lang('COMMENTS')
        </a>
    </div>

	<div class="tile">
        <form class="row justify-content-center" action="{{$comment->id ? route('comment.update', $comment->id) : route('comment.store')}}" method="post">
			@csrf
            @if ($comment->id)
                @method('PUT')
            @endif

            @unless ($comment->id)
                <div class="col-md-3 form-group">
    				<label for="owner-id"> @lang('OWNER_ID') </label>
                    <input type="number" class="form-control" id="owner-id" name="owner_id" value="{{old('oid') ?? request('oid')}}">
    			</div>
                <div class="col-md-3 form-group">
    				<label for="owner-type"> @lang('OWNER_TYPE') </label>
                    <input type="text" class="form-control" id="owner-type" name="owner_type" value="{{old('otype') ?? request('otype')}}">
    			</div>
            @endunless

            <div class="col-md-12 form-group">
				<label for="content"> @lang('CONTENT') </label>
				<textarea name="content" id="content" rows="8" class="form-control" required>{{old('content') ?? $comment->content}}</textarea>
			</div>

            <input type="hidden" name="confirmed" value="0">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="confirmed" id="confirmed" value="1"
                        @if(!$comment->id || $comment->confirmed) checked @endif>
                    <label class="custom-control-label" for="confirmed">
                        <span class="mr-2"> @lang('CONFIRM') </span>
                    </label>
                </div>
            </div>
            <hr class="w-100">
            <div class="col-md-2 mx-auto">
                <button type="submit" class="btn btn-primary btn-block"> @lang('SAVE') </button>
            </div>

		</form>
	</div>

@endsection
