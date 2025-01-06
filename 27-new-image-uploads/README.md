# Uploading & Displaying Images in a PHP Application

An image can be uploaded and displayed on your PHP website in multiple ways. The most common method of achieving this is by uploading the image into the server’s directory and updating its name in the database. This method is efficient because in this case, the image won’t take any space inside the database, and this will also make your webpage load faster. 

Another way is by inserting the image into the database directly, instead of uploading it into the server. This method is not recommended because the images take up a lot of space in the database, thereby increasing its size. This will also slow down the loading of your web pages. 


## The `$_FILE` Superglobal Variable

＄_FILES is a global constant or predefined variable in PHP that can be used to associate array items that are uploaded through the HTTP POST method.

Note: When you write your form to upload your file, remember to always set the value of the enctype form attribute as multipart\form-data.

### Properties

The file in the properties listed below is the name of the variable that contains the file.

＄_FILES['file']['name']: This is the name of the file to be uploaded originally.

＄_FILES['file']['type']: This holds the mime type of the file.

＄_FILES['file']['size']: This is the size of the file to be uploaded in bytes.

＄_FILES['file']['tmp_name']: This will include the temporary filename of the file in which the uploaded file was stored on the server.

＄_FILES['file']['error']: Any error code associated with the file upload will be saved here.


## File Sizes

By default, PHP will not process any images larger than 2MB. You can change this by finding `php.ini` and altering the following variables: 

```ini
    upload_max_size = 10M
    post_max_filesize = 10M
```
