<fieldset>
    <div  class="vs-radio-con vs-radio-primary">
        <input type="radio" {{$attributes }}  value="{{$attributes['value']}}" wire:model="{{$attributes['wire:model']}}" >
        <span class="vs-radio vs-radio-sm">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
            </span>
        <span class="">{{$attributes['title']}}</span>
    </div>

</fieldset>

@error($attributes['name'])
<div class="invalid-feedback" style="display: block;">
    {{$message}}
</div>
@enderror
