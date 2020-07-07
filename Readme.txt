Created a very simple MySQL database with two tables that is employees and employee_web_history. 
These table created through migration files.

GET, POST, DELETE API end points to for Create, Show and delete the Employees
and Employees websearch data based on the ip_address as a key.
Created using model for each table, controller to handle the API requests and binding with Route

TO RUN PROJECT::

*   Run Apache and MySQL using XAMPP, WAMP, etc

*   Run the Migration files using php artisan migrate command in Console. 
    This will create the above mentioned two tables

*   In Web Browser run http://localhost/proj_people/public or 
    set Vhost and run http://Proj_people/ to execute the project.

*   To dissect RESTful APIs run the APIs one at time.
    (i used Postman tool for testing)

    POST http://localhost/proj_people/public/api/employees (feed data using form-data)
    GET and DELETE http://localhost/proj_people/public/api/employees/{ip_address}

    POST http://localhost/proj_people/public/api/emp_web_history (feed data using form-data)
    GET and DELETE http://localhost/proj_people/public/api/emp_web_history/{ip_address}