@props([
'fields'
])

<div class="row">
    <div class="col-sm-12">
        <div class="card collapse-icon accordion-icon-rotate">
            <div class="card-body py-1">
                <div class="default-collapse collapse-bordered">
                    <div class="card collapse-header">
                        <div id="headingCollapse1" class="card-header" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            <h4 class="card-title">{{$attributes['title']}}</h4>
                        </div>
                        <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" wire:submit.prevent="search">
                                        <div class="form-body">
                                            <div class="row">
                                                @foreach($fields as $kay =>$field)
                                                    @if(isset($field[1]))
                                                        @php
                                                            if(isset($field[1]['model'])){
                                                                if(is_array($field[1]['model'])){
                                                                    $data=$field[1]['model'];
                                                                }else{
                                                                    $className = 'App\\Models\\'.$field[1]['model'];
                                                                    if(class_exists($className)) {
                                                                        $model = new $className;
                                                                        $data = $model::all();
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if($field[1]['type'] == 'select')
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">{{$field[0]}}</label>
                                                                    <select class="form-control select2" wire:model.defer="search_array.{{$kay}}" name="search_array.{{$kay}}">
                                                                        <option  selected >{{$field[0]}}</option>
                                                                        @foreach($data as $row)
                                                                            <option value="{{$row[$field[1]['value']]}}">{{$row[$field[1]['name']]}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($field[1]['type'] == 'multi_select')

                                                            <div class="col-md-4 col-12" wire:ignore >
                                                                <div class="form-group">
                                                                    <label>{{$field[0]}}</label>
                                                                    <select name="search_array.{{$kay}}" id="multiple_{{$kay}}" wire:model.defer="search_array.{{$kay}}"  class="form-control select2 ">
                                                                        <option selected >{{$field[0]}}</option>
                                                                        @foreach($data as $row)
                                                                            <option value="{{$row[$field[1]['value']]}}">{{$row[$field[1]['name']]}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @push('script')

                                                                        <script>
                                                                            $('#multiple_{{$kay}}').select2({
                                                                                dropdownAutoWidth: true,
                                                                                width: '100%'
                                                                            });

                                                                                $('#multiple_{{$kay}}').on('change', function (){
                                                                                var data = $('#multiple_{{$kay}}').val()
                                                                                $('#multiple_{{$kay}}').val();
                                                                            @this.set('search_array.{{$kay}}', data,true);
                                                                            });
                                                                        </script>
                                                                    @endpush
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if($field[1]['type'] == 'datalist')
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="exampleDataList" class="form-label">{{$field[0]}}</label>
                                                                    <input class="form-control" list="datalistOptions" wire:model="search_array.{{$kay}}" id="exampleDataList" placeholder="">
                                                                    <datalist id="datalistOptions">
                                                                        @foreach($data as $row)
                                                                            <option value="{{$row[$field[1]['name']]}}">
                                                                        @endforeach
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($field[1]['type'] == 'date')
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-group">
                                                                    <label for="{{$field[0]}}">{{$field[0]}}</label>
                                                                    <input type="text" onfocus="this.type='date'" wire:model.defer="search_array.{{$kay}}"   id="{{$kay}}" class="form-control" placeholder="{{$field[0]}}" name="{{$field[0]}}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label for="{{$field[0]}}">{{$field[0]}}</label>
                                                                <input type="text" wire:model.defer="search_array.{{$kay}}" id="{{$kay}}" class="form-control" placeholder="{{$field[0]}}" name="{{$field[0]}}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="col-12 mt-4 text-right">
                                                    <x-button
                                                            type="submit"
                                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light search_btn"
                                                            title="{{$attributes['search_button']}}"
                                                            wire:click="search"
                                                    />
                                                    <x-button
                                                            type="reset"
                                                            class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light"
                                                            title="{{$attributes['search_button_rest']}}"
                                                            wire:click="resetSearch"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>