@props([
'title',
])
<button @if(isset($attributes['type']))@else type="button" @endif     wire:loading.attr="disabled" {{$attributes}}>
    {{$title}}
    <span wire:loading wire:target="{{$attributes['wire:click']}}" >
        <i class="fa fa-spinner fa-spin "></i>
    </span>
</button>