@php
	$tokens = explode('&&&', $sms->tokens)
@endphp

@if (count($tokens))
	@if (count($tokens) == 1)
		{{$tokens[0]}}
	@else
		<ul class="pr-3">
			@foreach ($tokens as $token)
				<li> {{$token}} </li>
			@endforeach
		</ul>
	@endif
@else
	<em> بدون وردی </em>
@endif
