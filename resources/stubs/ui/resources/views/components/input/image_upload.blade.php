@props([
'image_object'=>null,
])
<style>
    .img-upload{
        display: inline-block;
        position: relative;
        height: 63px;
        width: 63px;
        box-shadow: 0px 5px 15px 0px rgba(0,0,0,0.25);
        border-radius: 50%;
        cursor: pointer;
        margin-bottom: 15px;
    }
    .img-upload img{
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    .img-upload .uploader{
        position: absolute;
        top: 0px;
        right: 0px;
        height: 63px;
        width: 63px;
        border-radius: 50%;
        opacity: 0;
        cursor: pointer;
    }
    .upload-edit{
        position: absolute;
        bottom: 0px;
        left: 0px;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        color: #fff;
        background-color: #3cec6a;
        border-radius: 50%;
        font-size: 11px;
    }
</style>
<div class="d-inline-block"
     x-data="{ isUploading: false,isDone:false ,progress: 'width:0%',progressPersent:0}"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false,isDone=true,progress ='width:0%'"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = 'width:'+$event.detail.progress+'%',progressPersent = $event.detail.progress"
>
    <div class="img-upload">
        <img src="{{$image_object?$image_object->temporaryUrl():$attributes['temporaryUrl'] }}" alt="" >
        <input type="file" class="uploader" wire:model="{{$attributes['image']}}" >
        <div  wire:loading.class.remove="" class="upload-edit"><i class="feather icon-edit"></i></div>
        <div wire:loading wire:target="{{$attributes['image']}}"  class="upload-edit"><i class="fas fa-spinner fa-spin"></i></div>
    </div>
    <div class="d-inline-block align-middle mb-3">
        <span class="upload-span">{{$attributes['title']}}</span>
        <div x-show="isUploading" class="progress upload-file-progress">
            <div class="progress-bar" role="progressbar"
                 x-bind:aria-valuenow="progress"
                 x-bind:aria-valuemin="progress"
                 x-bind:aria-valuemax="progress"
                 x-bind:style="progress"
            ></div>
        </div>
    </div>
</div>