<div >
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">@lang('lang.Permission')</h2>
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
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('lang.list')</th>
                                    <th scope="col">@lang('lang.view')</th>
                                    <th scope="col">@lang('lang.create')</th>
                                    <th scope="col">@lang('lang.edit')</th>
                                    <th scope="col">@lang('lang.delete')</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $permisions= \Config::get('action_roles'); ?>

                                @foreach($permisions as $key=>$permision)

                                    <tr>
                                        <th scope="row">@lang($key.".model_name")</th>
                                        @foreach($permision as $value)
                                            <td>
                                                <x-input.check
                                                        name="permisions.{{$value}}"
                                                        wire:model.defer="permisions.{{$value}}"  />
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                {{--@if(in_array('permission_edit',$this->actions_permission()) )--}}
                                <x-button  wire:click="save" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" title="{{__('lang.save')}}"></x-button>
                                {{--@endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>