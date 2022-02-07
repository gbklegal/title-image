<div class="title_image_metabox">
    <style scoped>
        #title-image-preview {
            max-width: 100%;
            margin-top: 10px;
            display: block;
        }
        #title-image-remove-button {
            color: #b32d2e;
            margin-top: 10px;
            display: inline-block;
        }
        /* #title-image-id {
            margin-top: 10px;
            display: block;
        } */
    </style>
    <a href="#" id="title-image-mediaselect-button"<?php if ($has_title_image_id) echo ' style="display: none;"'; ?>>Bild auswählen</a>
    <img id="title-image-preview" src="<?php if ($title_image_src) echo $title_image_src; ?>" alt="">
    <a href="#" id="title-image-remove-button"<?php if (!$has_title_image_id) echo ' style="display: none;"'; ?>>Bild entfernen</a>
    <input type="hidden" id="title-image-id" name="title_image_id" size="4" value="<?php echo $title_image_id; ?>">
</div>