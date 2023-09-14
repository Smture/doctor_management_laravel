## Doctor Management - Laravel

This is an assignemnt project for doctor appointments in laravel.


## Usage

1. Run the Migrations.
2. Create Roles in Roles tables as mentioned below.
   
    | full_name  | status |
    | ------------- | ------------- |
    | Admin  | active  |
    | Doctor  | active  |
   | Patient  | active  |

3. Add Appointment slots in the TIME_SLOTS table.
   
   | intervals 
    | ------------- |
    | 10:00-10:30 
    | 10:30-11:00  
   | 11:00-11:30

4. Create Dummy Users.
5. id, full_name, mobile, email, password, role_id, created_at, updated_at
   
    | id | full_name | mobile  | email | password  | role_id |
    | ------------- | ------------- | ------------- | ------------- | ------------- | ------------- |
    1  | Dr Demo  |7777755555  |dr@demo.com  |7777755555  |2  
    2  |Demo Patient  |9999955555  |patient@demo.com  |9999955555  |3  
    3  |Admin  |3333355555  |admin@demo.com  |3333355555  |1  

6. Use the get token api to get a jwt token first.
7. Use that token with "Bearer " in "Authorization" header of all the remaining API's.


