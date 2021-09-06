<div  x-data
      x-init="
        $('#{{$attributes['name']}}').pickadate({
              format: 'mmmm, d, yyyy',
               onClose: function() {
                    console.log($('#{{$attributes['name']}}').val());
                    let data =$('#{{$attributes['name']}}').val();
                    @this.set('{{$attributes['wire:model.defer']}}',data)
               }
        })

    ">
    <label>{{$attributes['title']}}</label>
    <input id="{{$attributes['name']}}" type='text' class="form-control moman"  {{$attributes}}/>
</div>

