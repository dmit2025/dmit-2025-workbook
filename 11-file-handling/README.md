# Working with Files in PHP

Because PHP is a server-side programming language, you may deal with files and directories on the web server. PHP has several functions for creating, reading, uploading, and editing files. 

We can read and write to a file on the server. We must open the file before we can read or write. When we open the file we must specify if it is for reading, writing, or appending.

Note: This should **never** be used to store or retrieve personally identifying information (PII) or data that needs to be secure. 

## File Handling Functions

fopen() function is used to open a file.

```PHP
    fopen($filename, mode);
```

fwrite() lets us write data to a file or add to an existing file.

```PHP
    fwrite($file_handle, string);
```

The fclose() function is used to close the file handle when you are finished working with the file.

```PHP
    fclose($file);
```

file_get_contents() reads the entire contents of a file and dumps it all into a string variable. This is one way of dealing with a file without all the faffing about of opening and closing files.

```PHP
    $contents = file_get_contents($file);
    echo $contents;
```

But instead of storing everything in a single string, you can also store it as an array of lines by using the file() function.

### File Modes

When opening a file, there are three main modes: 

`w` - Open a file - write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file

`r` - Open a file - read only. File pointer starts at the beginning of the file

`a` - Open a file - write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist  

There are a few more (x, r+, w+, a+, x+), but they are not used as often.