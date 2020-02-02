<label for="city"> * شهر </label>
<select class="new-select2" name="city_id" id="cities" required>
	@foreach ($cities as $city)
		<option value="{{$city->id}}">
			{{$city->name}}
		</option>
	@endforeach
</select>
