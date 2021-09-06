<div>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">@lang('[model].model_name')</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" >@lang('lang.Dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('[model].model_name')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <livewire:model-livewire :file="$file_name"  />
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                        wire:click="open_model('{{app()->getLocale()}}')" >
                    <i class="fa fa-language"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="data-thumb-view" class="data-thumb-view-header">
            <x-search :fields="$searchable" title="{{__('[model].model_search_name')}}" search_button="{{__('[model].model_search_button')}}" search_button_rest="{{__('[model].model_search_button_rest')}}" />
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="top">
                        <div class="actions action-btns">

                            <div class="dt-buttons btn-group">
                                <a href="{{route('dashboard.[model].create')}}"  class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-plus-circle"></i>
                                    @lang('[model].model_search_button_add')
                                </a>

                            </div>
                        </div>
                        <div class="action-filters">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    <x-table.pages name="page_length"/>
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

                                @$tr_data

                                <td class="product-action">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" wire:click="edit({{$value->id}})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" wire:click="delete({{$value->id}})"><i class="feather icon-trash"></i></button>
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

</div>
