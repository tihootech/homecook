@extends('layouts.dashboard')
@section('title')
    مدیریت کامنت ها
@endsection
@section('content')

    <div class="tile text-left">
        <form class="d-inline" action="{{route('confirm_all_comments')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check ml-2"></i>
                تایید همه کامنت ها
            </button>
        </form>
    </div>

	<div class="tile">
        @if ($comments->count())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"> ردیف </th>
                        <th scope="col"> مربوط به </th>
                        <th scope="col"> نویسنده </th>
                        <th scope="col"> محتوا </th>
                        <th scope="col"> تایید شده </th>
                        <th scope="col" colspan="3"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $i => $comment)
                        <tr>
                            <th scope="row"> {{$i+1}} </th>
                            <td>
                                <a href="{{$comment->owner ? $comment->owner->public_link() : '#'}}" target="_blank">
                                    @if ($comment->owner && $comment->owner->title)
                                        {{remove_class_name($comment->owner_type)}} : {{$comment->owner->title}}
                                    @else
                                        {{$comment->owner_type}}\{{$comment->owner_id}}
                                    @endif
                                </a>
                            </td>
                            <td>
                                @if ($comment->author)
                                    @if ($comment->author->type == 'master')
                                        <em> MASTER </em>
                                    @else
                                        <a href="{{route('user.show', $comment->author_id)}}">
                                            {{$comment->author_name()}}
                                        </a>
                                    @endif
                                @else
                                    <em> کاربر مهمان </em>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void" data-toggle="popover" data-title="متن کامل" data-content="{{$comment->body}}" data-placement="top" class="text-dark">
                                    {{short($comment->body, 40)}}
                                </a>
                            </td>
                            <td>
                                @include('dashboard.partials.yesno', ['boolean' => $comment->confirmed])
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('comment.confirm', $comment->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @if ($comment->confirmed)
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa fa-times ml-2"></i>
                                            ردکردن
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="fa fa-check ml-2"></i>
                                            تایید
                                        </button>
                                    @endif

                                </form>
                            </td>
                            <td>
                                <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-outline-success">
                                    <i class="fa fa-edit ml-2"></i>
                                    ویرایش
                                </a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{route('comment.destroy', $comment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger delete">
                                        <i class="fa fa-trash ml-2"></i>
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-2"></i>
                @lang('NOTHING_FOUND')
            </div>
        @endif
	</div>

@endsection
