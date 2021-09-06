@props([
'attributes_list',
])

@foreach($attributesList as $kay=>$list)
    @if($list['type'] =='text')
        <div class="col-md-6 col-lg-4">
            <label> {{$list['label']}} @if($list['is_required']) <span>*</span> @endif</label>
            <input
                    type="text"
                    class="form-control "
                   name="attributes.{{$kay}}.value"
                   wire:model.defer="attributes.{{$kay}}.value" @if($list['is_required']) required="required" @endif title="{{$list['label']}}" type="text" placeholder="{{$list['label']}}">
        </div>

        @endif
     @if($list['type'] =='number')

         <div class="col-md-6 col-lg-4">
             <label> {{$list['label']}} @if($list['is_required']) <span>*</span> @endif</label>
             <input
                     type="number"
                     class="form-control "
                     name="attributes.{{$kay}}.value"
                     wire:model.defer="attributes.{{$kay}}.value" @if($list['is_required'])
                     required="required" @endif title="{{$list['label']}}"
                     placeholder="{{$list['label']}}">
         </div>
        @endif
     @if($list['type'] =='date')
         <div class="col-md-6 col-lg-4">
             <label> {{$list['label']}} @if($list['is_required']) <span>*</span> @endif</label>
             <input
                     type="date"
                     class="form-control "
                     name="attributes.{{$kay}}.value"
                     wire:model.defer="attributes.{{$kay}}.value" @if($list['is_required'])
                     required="required" @endif title="{{$list['label']}}"
                     placeholder="{{$list['label']}}">
         </div>
        @endif
     @if($list['type'] =='color')
         <div class="col-md-6 col-lg-4">
             <label> {{$list['label']}} @if($list['is_required']) <span>*</span> @endif</label>
             <select class="form-control" wire:model.defer="attributes.{{$kay}}.value" >
                 <option value="" selected>{{$list['label']}}</option>
                @foreach($list['attribute_options'] as $option )
                     <option value="{{$option['value']}}">{{$option['label']}}</option>
                @endforeach
             </select>

         </div>
     @endif
     @if($list['type'] =='select')
         <div class="col-md-6 col-lg-4">
             <label> {{$list['label']}} @if($list['is_required']) <span>*</span> @endif</label>
             <select class="form-control" wire:model.defer="attributes.{{$kay}}.value" >
                 <option value="" selected>{{$list['label']}}</option>
                 @foreach($list['attribute_options'] as $option )
                     <option value="{{$option['value']}}">{{$option['label']}}</option>
                 @endforeach
             </select>

         </div>
     @endif


@endforeach


