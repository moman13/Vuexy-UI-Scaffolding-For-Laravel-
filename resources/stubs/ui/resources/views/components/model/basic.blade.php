<div class="modal fade text-left" id="basic" tabindex="-1" role="dialog" aria-labelledby="basicLabel"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="basicLabel">{{$attributes['title']}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <x-input.normal name="user.email" title="البريد الالكتروني" ></x-input.normal>
                    <x-input.normal name="user.email" title="البريد الالكتروني" ></x-input.normal>
                </div>
                <div class="modal-footer">
                    <x-button wire:click="password" class="btn btn-primary" title="حفظ"></x-button>
                    {{--<button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>--}}
                </div>
            </form>
        </div>
    </div>
</div>
