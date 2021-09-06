<div
        x-data
        x-init="

        FilePond.setOptions({
            server:{
             allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
                process:(fieldName,file,metadata,load,error,progress,abort,transfer,options)=>{
                    @this.upload('{{$attributes['name']}}',file,load,error,progress)
                },
                revert:()=>{
                    @this.removeUpload('{{$attributes['name']}}',filename,load)
                }
            },

        });
        FilePond.create($refs.{{$attributes['name']}});
    "
        wire:ignore>
    <input type="file" x-ref="{{$attributes['name']}}" {{isset($attributes['multiple']) ?'multiple':''}}>
</div>