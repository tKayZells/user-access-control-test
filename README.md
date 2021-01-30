## Solution

A **middleware** attach to all the routes that need to be checked, will get the **Access** model using the **current authenticated user** location, role and occupation. If the requested **route uri** is not part of the **route uri array** of the Access object, the user cannot access the resource/view therefore, we redirect the user to a forbidden page, otherwise we continue the middle chain until a response is provided.

## Solution Documentation

Documentation diagrams under [documentation](documentation) folder.

- Entity Relationship Diagram 
- Overview of Solution Flow Diagram
- In-depth Middleware Flow Diagram

## Laravel Pseudo Implementation

- Necessary ORM models under [App/Models](app/Models)
- Created Databases migrations on [Database/Migrations](database/migrations)
- Created [EnsureUserCanAccess.php](app/Http/Middleware/EnsureUserCanAccess.php) middleware where the access check resides
- [Kernel.php](app/Http/Kernel.php) modified, added new **middlewareGroup** named: ***access***, that checks for auth user and uses the previous middleware
- [Web routes](routes/web.php) modified, added forbidden route and example of usage of the created middlewareGroup