@props([
'options'
])

<fieldset class="form-group">
    @if(isset($attributes['title']))
        <label>{{$attributes['title']}}</label>
    @endif
    <select class="form-control @error($attributes['name']) is-invalid @enderror " {{$attributes}} >

        <option  value="" selected>{{$attributes['title']}}</option>
        @foreach($options as $option)
            <option value="{{isset($attributes['value_id'])?$attributes['value_id']:$option['id']}}">{{$option[$attributes['value']]}}</option>
        @endforeach
    </select>
    @error($attributes['name'])
    <div class="invalid-feedback" style="display: block;">
        {{$message}}
    </div>
    @enderror
</fieldset>