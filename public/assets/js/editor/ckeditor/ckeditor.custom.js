// Default ckeditor
CKEDITOR.replace( 'editor1', {
    // toolbar mini
    toolbar: [
        [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],
        [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
        [ 'Link', 'Unlink', 'Anchor' ],
        [ 'Table', 'HorizontalRule', 'SpecialChar' ],
        [ 'Styles', 'Format', 'Font', 'FontSize' ],
        [ 'TextColor', 'BGColor' ],
        [ 'Maximize', 'ShowBlocks' ]
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
