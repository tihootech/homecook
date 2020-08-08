@extends('layouts.dashboard')

@section('title')
    مسابقات
@endsection

@section('content')
    <div class="tile text-left">
        <a href="{{route('compt.create')}}" class="btn btn-primary"> <i class="material-icons">add</i> مسابقه جدید </a>
    </div>
    <div class="tile">
        <h3 class="mb-4 text-center"> لیست مسابقات </h3>
        @if ($compts->count())
            <div class="table-responsive-lg">
                <table class="table table-bordered table-hovered table-stripped">
                    <thead>
                        <tr>
                            <th> ردیف </th>
                            <th> عنوان </th>
                            <th> تاریخ </th>
                            <th> توضیحات </th>
                            <th colspan="3"> عملیات </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compts as $i => $compt)
                            <tr>
                                <th> {{$i+1}} </th>
                                <td> {{$compt->title}} </td>
                                <td> {{human_date($compt->date)}} </td>
                                <td> {{short($compt->info, 75)}} </td>
                                <td data-toggle="tooltip" data-title="ویرایش">
                                    <a href="{{route('compt.edit', $compt)}}" class="text-success"> <i class="material-icons">edit</i> </a>
                                </td>
                                <td data-toggle="tooltip" data-title="جزییات و تایین برندگان">
                                    <a href="{{route('compt.show', $compt)}}" class="text-primary"> <i class="material-icons">list</i> </a>
                                </td>
                                <td data-toggle="tooltip" data-title="حذف">
                                    <form class="d-inline" action="{{route('compt.destroy', $compt)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="text-danger delete"> <i class="material-icons">delete</i> </a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$compts->links()}}
        @else
            <div class="alert alert-warning">
                مسابقه ای تعریف نشده است.
            </div>
        @endif
    </div>
@endsection
