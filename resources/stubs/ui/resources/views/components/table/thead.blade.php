@props([
'col',
'sortBy',
'sortDirection'
])
<thead>
<tr role="row">
        <?php $count=0;?>

    @foreach($col as $key=>$value)
        @if($key =='#')
                    <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled"
                        tabindex="0"
                        aria-controls="DataTables_Table_0"
                        rowspan="1"
                        colspan="1"
                        style="width: 35px;"
                        data-col="0"
                        aria-label="">
                        <input type="checkbox" wire:model="selectPage"></th>
        @else
            @if($value[2])
            <th  @if($value[3])

                 wire:click="sortBy('{{$key}}')"

                  @if($sortDirection =='desc' &&  $sortBy ==$key) class="sorting_desc" @else class="sorting_asc" @endif

                 @endif

                 rowspan="1"

                 colspan="1">
                {{$value[0]}}
            </th>

            <?php $count++;?>
            @endif
        @endif
    @endforeach
</tr>
</thead>