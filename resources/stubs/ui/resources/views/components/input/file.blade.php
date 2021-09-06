<style>
    .custom-upload-box{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
        background-color: #F8F8F8;
        border: 1px dashed #7367F0;
        border-radius: 5px;
        font-size: 16px;
    }
    .custom-upload-box i{
        font-size: 50px;
    }
    .custom-upload-box span{
        display: block;
        font-size: 16px;
        margin-bottom: 5px;
    }
    .uploader-file h6{
        font-size: 14px;
        font-weight: normal;
        margin: 0px;
        color: #b0b0b0;
        margin: 20px 0px 10px;
    }
    .uploader-file .media{
        border-radius: 5px;
    }
    .uploader-file .media:hover{
        box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.14);
    }
    .uploader-file .media .progress{
        display: inline-block;
        width: 85%;
        margin: 0px;
    }
    .uploader-file .media .btn, .uploader-file .media .done{
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 14px;
        padding: 0px;
    }
    .uploader-file .media .size{
        font-size: 14px;
        color: #b0b0b0;
    }
</style>
<div
        x-data="{ isUploading: false,isDone:false ,progress: 'width:0%',progressPersent:0}"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false,isDone=true "
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = 'width:'+$event.detail.progress+'%',progressPersent = $event.detail.progress"
>
    <!-- File Input -->
    <input style="display: none"  id="{{$attributes['id']}}" name="{{$attributes['id']}}" type="file" wire:model="{{$attributes['name']}}">

    <!-- Progress Bar -->
    <div class="uploader-file">
        <h6>{{$attributes['title']}}</h6>
        <div class="media-list">
            <div class="media p-1">
        <div class="media-left" >
            <label  for="{{$attributes['id']}}">
                <img src="{{asset('images/uploader.png')}}" alt="Generic placeholder image" height="64" width="64">
            </label>

                {{----}}
            {{--<img src="" alt="Generic placeholder image" height="64" width="64">--}}
            {{--</label>--}}
        </div>
        <div class="media-body"   >
            <div class="d-flex justify-content-between align-items-center pb-1">
                <label></label>
                <span x-text="progressPersent"></span>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="progress progress-bar-primary">
                    <div class="progress-bar h-100"
                         role="progressbar"
                         x-bind:aria-valuenow="progress"
                         x-bind:aria-valuemin="progress"
                         x-bind:aria-valuemax="progress"
                         x-bind:style="progress"
                         aria-describedby="example-caption-4"></div>
                </div>

                <button x-show="isUploading" class="btn btn-danger waves-effect waves-light"><i class="fa fa-times mr-0"></i></button>
                <button x-show="isDone" class="btn btn-success waves-effect waves-light"><i class="fa fa-check mr-0"></i></button>
            </div>
        </div>
    </div>
        </div>
    </div>

</div>