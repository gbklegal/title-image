// title image media select
jQuery(document).ready(function($) {
    $('#title-image-mediaselect-button').click(function(event) {
        event.preventDefault();

        let image = wp.media({
            title: 'Wähle ein Bild aus',
            multiple: false
        }).open()
        .on('select', function() {
            // this will return the selected image from the media uploader, the result is an object
            let selectedImage = image.state().get('selection').first();
            // convert selectedImage to a JSON object to make accessing it easier
            selectedImage = selectedImage.toJSON();
            // get image id
            let imageId = selectedImage.id;
            // get image url
            let imageUrl = selectedImage.url;
            // assign the id value to the input field
            $('#title-image-id').val(imageId);
            // assign the url to the preview img src
            $('#title-image-preview').attr('src', imageUrl);
            // hide select image 'button'
            $('#title-image-mediaselect-button').hide();
            // show remove 'button'
            $('#title-image-remove-button').show();
        });
    });

    $('#title-image-remove-button').click(function(event) {
        event.preventDefault();

        // 'hide' image from preview
        $('#title-image-preview').removeAttr('src');
        // clear image id value
        $('#title-image-id').val('');
        // show the select 'button'
        $('#title-image-mediaselect-button').show();
        // hide the remove 'button'
        $(this).hide();
    });
});