# CRUD Applications: Edit

Editing (or updating) a record in a CRUD application is one of the trickier operations. The read is that you have to deal with two separate sets of data: 

    1. The data that is currently stored in the database. 
    2. The updated information that the user provides. 

Editing will be similar to the Add (or creating) functionality in that the user will be presented a form that they will need to fill out. However, instead of starting off with an empty form, the fields will need to be prepopulated with all of the information already in the database. This is especially important if the user only wants to update a single field (ex. a typo in the record name) rather than everything at once.