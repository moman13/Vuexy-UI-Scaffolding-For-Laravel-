
    <label>{{$attributes['title']}}</label>
    <div class="input-group mb-75">
        <div class="input-group-prepend ">
            <span class="input-group-text {{$attributes['icon']}}" id="basic-addon3"></span>
        </div>
        <input @if(isset($attributes['type'])) type={{$attributes['type']}} @else type="text" @endif   class="form-control @error($attributes['name']) is-invalid @enderror " name="{{$attributes['name']}}"  placeholder="{{$attributes['title']}}"  wire:model.defer={{ $attributes['name'] }} />
        @error($attributes['name'])
        <div class="invalid-feedback" style="display: block;">
            {{$message}}
        </div>
        @enderror
    </div>

