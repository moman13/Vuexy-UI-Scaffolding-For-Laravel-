
<div class="form-group ">
    <div class="controls">
        <label>{{$attributes['title']}}</label>
        <input @if(isset($attributes['type'])) type={{$attributes['type']}} @else type="text" @endif   class="form-control @error($attributes['name']) is-invalid @enderror " name="{{$attributes['name']}}"  placeholder="{{$attributes['title']}}"  wire:model.defer={{ $attributes['name'] }} />
    </div>
    @error($attributes['name'])
    <div class="invalid-feedback" style="display: block;">
        {{$message}}
    </div>
    @enderror
</div>