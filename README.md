### List of people

- Yennam Santhosh Kamal Murthy
- Gorantle Naveen


### Identified Bugs (if any)

- It seems that the time is not being accurately (Date is accurate) recorded in the "purchased" field for an Asset when we assign an owner to the Asset. This should be investigated and corrected so that the time is accurately recorded.
- On the Assign Ownership page, it would be more user-friendly to display a message instead of an empty dropdown when no Assets are available to assign to a particular person. The message should inform the user that there are no available Assets to assign an owner to.
- In the Ownership Index page, when there are no Assets assigned to a person, we are currently displaying an empty table, which could be confusing to the user. Instead, it would be better to display a message indicating that there are no Assets assigned to this person. This will help the user to better understand the state of their Assets.
- We are unable to use css folder which is inside resources folder (resources/css). To have common css files for blade files, we have created css folder inside public folder (public/css) then accessed them inside blade files.

### What we learned

- We have created Controllers to handle requests,  Models to interact with tables from database,  Migrations for create,update the tables.
- We displayed dynamic data in HTML pages using blade (programming using loops and conditions which is useful to have dynamic pages).
- We handled exceptions in some methods inside controller using try catch blocks.
- We leant to use redirect method if we get any error in retrieving data from database or validating data.
- We created foreign key for Asset table using migration, to retrieve data from another table (person). We Learnt to link two tables in the database to retrieve data from both of them.
- We have middleware for some methods ( made them restricted to public users/apis).

### Things to learn

- If we have more logic, it would be useful to call service Class (where our logic present) inside Controller class.
- Make api calls to other backends from laravel project (using Http library)
- Add some more dependencies of other libraries and use them inside our project (we used braze in this project).
- Writing unit tests.