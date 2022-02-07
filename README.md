# Title Image (Titelbild)

## Utility functions

```php
<?php

    // echos the image
    the_title_image();

    // return the image
    get_title_image();

    // checks if image exists
    has_title_image();

?>
```

## Shortcode

```html
[title_image]

<!-- optional size tag -->
[title_image size="full"]
```

### sizes

| Name | Description | Default |
|--|--|--|
| thumbnail | Thumbnail: (150px square) | ❌ |
| medium | Medium size: (maximum 300px width and height) | ✅ |
| large | Large size: (maximum 1024px width and height) | ❌ |
| full | Full size: (full/original image size you uploaded) | ❌ |
| "" | Keep clear to get the best result | ❌ |
