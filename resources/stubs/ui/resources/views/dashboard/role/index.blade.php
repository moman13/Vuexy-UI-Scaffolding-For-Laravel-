<div>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">

            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">@lang('role.Permission')</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" >@lang('lang.Dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('role.Permission')</li>
                        </ol>
                    </div>
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
        <section id="data-thumb-view" class="data-thumb-view-header">
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="top">
                        @if(in_array('role_create',$this->actions_permission()) )
                        <div class="actions action-btns">
                            <div class="btn-dropdown mr-1 mb-1">
                                <button wire:click="add"  class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-plus-circle"></i> @lang('role.Add_Permission')</button>

                                {{--<div class="btn-group dropdown actions-dropodown">--}}
                                    {{--<button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--@lang('lang.Actions')--}}
                                    {{--</button>--}}
                                    {{--<div class="dropdown-menu">--}}
                                        {{--<a wire:click="add" class="dropdown-item" ><i class="feather icon-file"></i>@lang('lang.Add_Permission')</a>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                        @endif
                        <div class="action-filters">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    <x-table.pages name="page_length"/>
                                </label>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <x-table.search name="search"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <table class="table data-thumb-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
                        <x-table.thead :col="$columes" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                        <tbody>
                        @forelse($data  as $i=>$value)
                            <tr role="row" class="{{$i%2?'odd':'even'}}" >

                                <td class="product-name">{{$value->name}} </td>
                                <td class="product-action">
                                    @if(in_array('role_delete',$this->actions_permission()) )
                                    <button  type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" wire:click="delete({{$value->id}})"><i class="feather icon-trash"></i></button>
                                    @endif
                                     @if(in_array('role_edit',$this->actions_permission()) )
                                    <button type="button"  class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" wire:click="edit({{$value->id}})"><i class="feather icon-edit"></i></button>
                                    @endif
                                    @if(in_array('permission_show',$this->actions_permission()) )
                                     <button type="button"  class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1 waves-effect waves-light" wire:click="permission({{$value->id}})"><i class="feather icon-lock"></i></button>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <x-table.nodata/>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="bottom">
                        <div class="actions"></div>
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{$data->links()}}
                        </div>
                    </div>

                </div>
            </div>


        </section>
    </div>
    <div wire:ignore.self class="modal fade text-left" id="basic" tabindex="-1" role="dialog" aria-labelledby="basicLabel"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="basicLabel">{{$model_title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <x-input.normal name="form.name" title="{{__('role.Permission_name')}}" ></x-input.normal>
                    </div>
                    <div class="modal-footer">
                        @if(isset($form['id']))

                            <x-button   wire:click="update({{$form['id']}})"  class="btn btn-primary" title="{{__('role.edit')}}"></x-button>

                        @else

                            <x-button   wire:click="save"  class="btn btn-primary" title="{{__('lang.save')}}"></x-button>

                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
