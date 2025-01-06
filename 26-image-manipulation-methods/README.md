# Image Processing Methods

The GD extension for image creation and manipulation is enabled in most popular PHP distributions, but it's not part of the PHP core, so you need to verify that it's enabled on your server by running phpinfo. 

```PHP 
    phpinfo();
```

All the installed modules are alphabetical, but what we're looking for is past the core section. It will tell you which image types are supported (JPEG, GIF, PNG, WebP, but not SVG).

This extension has more than 100 functions that allow you to create, manupulate, and merge images, to convert from one image type to another, and more.

The most important feature is that it's non-destructive; we will always work with a copy of an image, not the original. 


## How the process works

Let's say you have an image that you'd like to resize.

1. You'll begin by creating a resource that loads the image into memory. This is a copy of the original.

2. From here, you can simple run the functions that you need in order to do whatever it is you need to do, including adding a watermark.

3. After making all of your changes, you'll need to save your altered image to file. Your output MIME type does not have to be the same as the original; PHP will make the conversion for you.

4. Finally, you need to destroy all of the working image resources. 

Note: Image resources take up a lot of memory, so if you're working with multiple images, it's important to destroy image resources as soon as they're no longer needed.

The biggest caveat is that everything is done programatically. This means that there is no visual feedback as you're going through the process -- you just have to check the final output.
