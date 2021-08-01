<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            height: 500,
            plugins: 'emoticons image imagetools media charmap lists advlist bbcode code codesample wordcount autolink link autosave spellchecker',
            toolbar: 'undo redo | styleselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist | media image charmap emoticons codesample | outdent indent | restoredraft code spellchecker',
            setup: function(editor) {
                editor.on('blur', function(e) {
                    value = editor.getContent()
                })
                editor.on('init', function (e) {
                    if (value != null) {
                        editor.setContent(value)
                    }
                })
                function putCursorToEnd() {
                    editor.selection.select(editor.getBody(), true);
                    editor.selection.collapse(false);
                }
                $watch('value', function (newValue) {
                    if (newValue !== editor.getContent()) {
                        editor.resetContent(newValue || '');
                        putCursorToEnd();
                    }
                });
            }
        })
    "
wire:ignore>
    <div>
        <textarea
            x-ref="tinymce"
            {{ $attributes->whereDoesntStartWith('wire:model') }}
        ></textarea>
    </div>
</div>
  
 
 
 
 