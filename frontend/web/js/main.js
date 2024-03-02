$(document).ready(function (){
    $('.ckeditor').each(function (){
        let id = $(this).attr('id');
        ClassicEditor
            .create( document.querySelector( `#${id}` ) )
            .catch( error => {
                console.error( error );
            } );
    });
})