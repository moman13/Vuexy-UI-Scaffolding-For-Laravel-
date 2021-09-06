<h4 class="text-center">{{__('lang.Photo')}}</h4>
<p class="text-center" style="color: red">يجب أن تكون الصورة ذات مقاس :1144px  * 200px</p>
<div class="upload-btn-wrapper mx-auto">
    <div class="upload-btn">
        @if($image)

            <img src="{{$image->temporaryUrl()}}">
        @else
            <img src="{{$gallary_banner->image_url}}">

        @endif


    </div>
    <input type="file" class="profile-img-input"  id="image"   wire:model="image">

</div>