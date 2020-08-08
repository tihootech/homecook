@extends('layouts.dashboard')

@section('title')
    مسابقات
@endsection

@section('content')
    <div class="tile text-left">
        <a href="{{route('compt.index')}}" class="btn btn-primary"> <i class="material-icons">list</i> لیست مسابقات </a>
    </div>

    <div class="tile">
        <h3 class="mb-4 text-center"> شرکت کنندگان </h3>
        @if ($compt->competitives->count())
            <div class="row justify-content-center">
                @foreach ($compt->competitives as $competitive)
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <b> {{$competitive->full_name}} </b>
                                <hr>
                                <span> {{$competitive->mobile}} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">
                هنوز کسی در این مسابقه شرکت نکرده است.
            </div>
        @endif
    </div>

    <div class="tile">
        <h3 class="mb-4 text-center"> تایین برندگان </h3>

        @if ($compt->competitives->count())
            <form class="row justify-content-center" action="{{route('compt.winners', $compt)}}" method="post">

                @csrf

                @for ($i=1; $i <= 3; $i++)
                    <div class="form-group col-md-3">
                        <label for="rank-{{$i}}">
                            {{__("rank_{$i}")}}
                        </label>
                        <select class="form-control" name="rank_{{$i}}" required>
                            <option value=""> -- انتخاب کنید -- </option>
                            @foreach ($compt->competitives as $competitive)
                                @php $var = "rank_{$i}" @endphp
                                <option value="{{$competitive->id}}" @if($compt->$var == $competitive->id) selected @endif>
                                    {{$competitive->full_name}} ({{$competitive->mobile}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endfor

                <hr class="w-100">

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block"> ذخیره </button>
                </div>

            </form>
        @else
            <div class="alert alert-warning">
                هنوز کسی در این مسابقه شرکت نکرده است.
            </div>
        @endif

    </div>
@endsection
