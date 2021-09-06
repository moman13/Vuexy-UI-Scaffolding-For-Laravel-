<div >
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">

        <!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">@lang('lang.account_information')</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                <!-- users edit account form start -->
                                <form id="profile_update" >
                                    <div class="row">
                                        <div class="col-12 col-sm-6" wire:ignore.self >
                                            <x-input.normal name="user.name" title="{{__('lang.UserName')}} " ></x-input.normal>
                                            <x-input.normal name="user.email" title="{{__('lang.email')}}" ></x-input.normal>

                                            <?php $roles = \App\Models\Role::all() ?>
                                            <x-input.select wire:model.defer="user.role_id"
                                                            name="user.role_id"
                                                            :options="$roles"
                                                            value="name"
                                                            title="{{__('lang.user_type')}}" />

                                            <x-input.normal name="user.password" title="{{__('lang.Password')}}" ></x-input.normal>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h4 class="text-center">{{__('lang.Profile_Photo')}}</h4>
                                            <div class="upload-btn-wrapper mx-auto">
                                                <div class="upload-btn">
                                                    @if($avatar)

                                                        <img src="{{$avatar->temporaryUrl()}}">
                                                    @else
                                                        <img src="{{$user['avatar'] }}">

                                                    @endif


                                                </div>
                                                <input type="file" class="profile-img-input"  id="image"   wire:model="avatar">

                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            @if(isset($user['id']))
                                                @if(in_array('user_management_edit',$this->actions_permission()) )
                                                <x-button  wire:click="update({{$user['id']}})" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" title="{{__('lang.edit')}}"></x-button>
                                                @endif
                                            @else
                                                @if(in_array('user_management_create',$this->actions_permission()) )
                                                <x-button  wire:click="save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" title="{{__('lang.save')}}"></x-button>
                                                 @endif
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