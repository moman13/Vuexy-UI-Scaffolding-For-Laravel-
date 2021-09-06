<style>
    .ql-container.ql-snow {
        height: 130px;
    }
</style>
<div wire:ignore x-data
     x-init="
     toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'ltr' }],                         // text direction
   [{ 'align': 'ltr' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],

  ['clean']                                         // remove formatting button
];
     quill = new Quill('#{{$attributes['id']}}', {
     modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow',
  });
  quill.format('direction', 'rtl');
quill.format('align', 'right');
  quill.on('text-change', function(delta, oldDelta, source) {
         content = $('#{{$attributes['id']}}').html();
        @this.set('{{$attributes['name']}}',content,true)

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