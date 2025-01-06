# Single Record View

Often, displaying all of the data that we have doesn't make for a good user experience. Generating a massive HTML table with as many columns as we have in our database can make it difficult to keep track of things and create a terrible mobile layout. 

Instead, we can display a few columns to the user and have a separate page that retrieves all of the information for a single record. This can make things less overwhelming.

## Data Browsing Application

In this lesson, we'll start a new read-only application with a dataset from the Happy Planet Index, available here: https://happyplanetindex.org/

As there are over 150 records in their table, this will allow us to apply common browsing and filtering patterns, including pagination, search results, and filters.