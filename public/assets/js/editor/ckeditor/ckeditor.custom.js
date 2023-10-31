// Default ckeditor
CKEDITOR.replace( 'editor1', {
    // toolbar mini
    toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
        [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
        [ 'Link', 'Unlink' ],
        [ 'Table' ],
        [ 'Styles', 'Format', 'Font', 'FontSize' ],
        [ 'TextColor', 'BGColor'],
        [ 'Maximize']
    ],
    on: {
        contentDom: function( evt ) {
            // Allow custom context menu only with table elemnts.
            evt.editor.editable().on( 'contextmenu', function( contextEvent ) {
                var path = evt.editor.elementPath();

                if ( !path.contains( 'table' ) ) {
                    contextEvent.cancel();
                }
            }, null, null, 5 );
        }
    }
} );

// Inline ckeditor
CKEDITOR.disableAutoInline = true;
