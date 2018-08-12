<option></option>
@if(!empty($concern))
  @foreach($concern as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
