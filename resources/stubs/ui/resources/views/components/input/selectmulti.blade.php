@props([
'options',
'selected'=>[]
])

<?php $id=$attributes['id']?$attributes['id']:'select2' ?>

<div wire:ignore  x-data
     x-init="
    $('.select2').select2({dropdownAutoWidth: true,
        width: '100%'
        });
           $('#{{$id}}').on('change', function (e){

            let data = $(this).val();

             @this.set('{{$attributes['name']}}', data);
});">


    <fieldset class="form-group">
        <label>{{$attributes['title']}}</label>
        <select id="{{$id}}" wire:model="{{$attributes['name']}}"  name="{{$attributes['name']}}"  @if(isset($attributes['multiple'])) multiple ="{{$attributes['multiple']}}"  @endif class="form-control select2  @error($attributes['name']) is-invalid @enderror" >
           <option selected  value="">{{$attributes['title']}}</option>
            @foreach($options as $option)
                    <option {{in_array($option['id'],$selected)?'selected':''}} value="{{$option['id']}}">{{$option[$attributes['value']]}}</option>
            @endforeach
        </select>

    </fieldset>

</div>
@error($attributes['name'])
<div class="invalid-feedback" style="display: block;">
    {{$message}}
</div>
@enderror