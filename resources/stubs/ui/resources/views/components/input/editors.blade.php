
@push('style')
    <link href="{{asset('admin-layout/editors/froala_editor_3.2.6-1/css/froala_editor.pkgd.min.css')}}" rel='stylesheet' type='text/css'/>

    <!-- Include TUI CSS. -->
    <link rel="stylesheet" href="{{asset('admin-layout/editors/tui-image-editor/dist/tui-image-editor.css')}}">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-color-picker/latest/tui-color-picker.css">
    <!-- Include TUI Froala Editor CSS. -->
    <link rel="stylesheet" href="{{asset('admin-layout/editors/froala_editor_3.2.6-1/css/third_party/image_tui.min.css')}}">
@endpush
<div  wire:ignore x-data
      x-init="
      editor =new FroalaEditor('#{{$attributes['id']}}',{
      language: '{{app()->getLocale()}}',
    events: {
    contentChanged: () => {
     const currentHtml = this.editor.html.get();
     @this.set('{{$attributes['name']}}',currentHtml);
    }
    }
    });

 ">

    <label>{{$attributes['title']}}</label>
    <div id="{{$attributes['id']}}" style="direction: rtl;">
        {{ $slot }}
    </div>
</div>
@error($attributes['name'])
<div class="invalid-feedback" style="display: block;">
    {{$message}}
</div>
@enderror
@push('script')

    @if ( app()->getLocale()== 'ar')
        <script type='text/javascript' src="{{asset('admin-layout/editors/froala_editor_3.2.6-1/js/languages/ar.js')}}"></script>
    @endif
    <!-- Include TUI JS. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.6.7/fabric.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>
    {{--<script type="text/javascript" src="{{asset('admin-layout/editors/tui-image-editor/dist/tui-image-editor.min.js')}}"></script>--}}

    <!-- Include TUI plugin. -->
    <script type="text/javascript" src="{{asset('admin-layout/editors/froala_editor_3.2.6-1/js/third_party/image_tui.min.js')}}"></script>

    <!-- END: froala-editor-->
    @endpush

