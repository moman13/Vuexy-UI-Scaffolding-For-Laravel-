
<div >
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('setting.Setting_Page')}}</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                        wire:click="open_model('{{app()->getLocale()}}')" >
                    <i class="fa fa-language"></i>
                </button>
            </div>
        </div>


        <livewire:model-livewire :file="$file_name"  />


    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content" >
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                            </li>
                        </ul>
                        <div class="tab-content"  >
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                <!-- users edit account form start -->
                                <form id="profile_update" >
                                    <div class="row">
                                        <div class="col-12 col-sm-6">

                                            <x-input.normal name="website_name" title="{{__('setting.WebsiteName')}}"></x-input.normal>
                                            <x-input.normal name="setting.email" title="{{__('setting.email')}}" ></x-input.normal>
                                            <x-input.normal name="setting.phone" title="{{__('setting.Phone')}}" ></x-input.normal>
                                            <x-input.normal name="setting.mobile_1" title="{{__('setting.Mobile1')}}" ></x-input.normal>
                                            <x-input.normal name="setting.mobile_2" title="{{__('setting.Mobile2')}}" ></x-input.normal>
                                            <x-input.normal name="address_1" title="{{__('setting.Address1')}}" ></x-input.normal>
                                            <x-input.normal name="address_2" title="{{__('setting.Address2')}}" ></x-input.normal>




                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h4 class="text-center">{{__('setting.Setting_Logo')}}</h4>
                                            <div class="upload-btn-wrapper mx-auto">
                                                <div class="upload-btn">
                                                    @if($logo)

                                                        <img src="{{$logo->temporaryUrl()}}">
                                                    @else
                                                        <img src="{{$setting->logo_url}}">

                                                    @endif


                                                </div>
                                                <input type="file" class="profile-img-input"  id="image"   wire:model="logo">

                                            </div>
                                            <h4 class="text-center">{{__('setting.Setting_Favicon')}}</h4>
                                            <div class="upload-btn-wrapper mx-auto">
                                                <div class="upload-btn">
                                                    @if($favicon)

                                                        <img src="{{$favicon->temporaryUrl()}}">
                                                    @else
                                                        <img src="{{$setting->favicon_url}}">

                                                    @endif


                                                </div>
                                                <input type="file" class="profile-img-input"  id="image"   wire:model="favicon">

                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <x-input.inputgroup name="setting.facebook" title="{{__('setting.facebook')}}" icon="feather icon-facebook" ></x-input.inputgroup>
                                            <x-input.inputgroup name="setting.instagram" title="{{__('setting.instagram')}}"  icon="feather icon-instagram"></x-input.inputgroup>
                                            <x-input.inputgroup name="setting.linked_in" title="{{__('setting.linked_in')}}"  icon="fa fa-linkedin"></x-input.inputgroup>
                                            <x-input.textarea name="seo_description"  wire:model.defer="seo_description" title="{{__('setting.seo_description')}}"  class="form-control" rows="5" >{{$setting->seo_description}}</x-input.textarea>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <x-input.inputgroup name="setting.twitter" title="{{__('setting.twitter')}}"  icon="feather icon-twitter"></x-input.inputgroup>
                                            <x-input.inputgroup name="setting.whatsapp" title="{{__('setting.whatsapp')}}"  icon=" fa fa-whatsapp"></x-input.inputgroup>
                                            <x-input.normal name="seo_keywords" title="{{__('setting.seo_keywords')}}" ></x-input.normal>

                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            @if(in_array('settings_edit',$this->actions_permission()) )
                                            <x-button dusk="profile_update" wire:click="save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" title="{{__('lang.save')}}"></x-button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>