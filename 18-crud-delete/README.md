# CRUD Applications: Delete

So far, we've covered how to read information in a table and display it to the user, as well as how to add new information. In this lesson, we'll cover how to delete records from a table through a web interface. 

Deletions are inherently risky, especially if your database and its information isn't regularly backed up and maintained. Because of this, it's important that we prompt the user to confirm that they want to delete a specific record. 

There are many ways of doing this, including: 

    - Using a JavaScript Alert window to confirm or cancel the deletion
    - Using a modal window to confirm with the user
    - Changing the language in a button that the user clicks (ex. 'Delete' might become 'Really delete?'), making them click it twice. 
    - Redirecting the user to a confirmation page. 

Because we want to use as little JS as possible and we're already comfortable with redirects, we will go over how to implement a delete functionality with a confirmation page together. 