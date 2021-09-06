@props([
    'index',
    'title'=>""
])

<div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
    <p class="mb-0">{{$title}}</p>
    <input  {{$attributes}}
            @if(isset($attributes['is_checked']))
                @if($attributes['is_checked']=='true')
                     checked
                @endif
            @endif
            type="checkbox"  name="{{$attributes['name']}}"  id="customSwitch{{$index}}" class="custom-control-input">
    <label for="customSwitch{{$index}}" class="custom-control-label"></label>
</div>