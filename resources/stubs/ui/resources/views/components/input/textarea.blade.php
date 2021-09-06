<fieldset class="form-group">
    <label for="">{{$attributes['title']}}</label>
    <textarea  {{$attributes}}    rows="{{$attributes['rows']}}" class="form-control @error($attributes['wire:model.defer']) is-invalid @enderror ">{{$slot}}</textarea>
</fieldset>

@error($attributes['wire:model.defer'])
<div class="invalid-feedback" style="display: block;">
    {{$message}}
</div>
@enderror