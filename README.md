## About Trip Builder

Outline
An airline has a name and is identified by a IATA Airline Code.
Ex: Air Canada (AC)
An airport is a location identified by a IATA Airport Code. It also has a name, a city, latitude and
longitude coordinates, a timezone and a city code, the IATA Airport Code for a city, which may
differ from an airport code in larger areas.
Ex: Pierre Elliott Trudeau International (YUL) belongs to the Montreal (YMQ) city code.
A flight is uniquely numbered for a referenced airline. For the sake of simplicity, a flight is priced
for a single passenger (any gender, any type) in a neutral currency and is available every day of
the week. It references a pair of airports for departure and arrival. It has departure and arrival
times in the corresponding airport timezones.
Ex: AC301 from YUL to YVR departs at 7:35 AM (Montreal) and arrives at 10:05 AM (Vancouver).

Mission
Create Web Services to build and navigate trips for a single passenger using criteria such as
departure locations, departure dates and arrival locations. Be mindful of timezones!
A trip references one or many flights with dates of departure. The price amounts to the total of
the price of the referenced flights.
The following trip types MUST be supported:
● A one-way is a flight getting from A to B
● A round-trip is a pair of one-ways getting from A to B then from B to A
A trip MUST depart after creation time at the earliest or 365 days after creation time at the latest.
## Technical Requirements
- Server-side application(s) is written in PHP (Laravel) and php-sqlite required
- CRUD operation for FLIGHT,AIRPORT,AIRLINES are done using laravel and blade
- Authentication is done with Laravel Breeze
- Can be used any database, all the migrations file are ready.
- But for simplicity I am using SQLITE. It is in root folder as a back up as well as in database folder. If you want use with pre define data please copy the root database.sqlite file into the database folder.
- To run the project you need make sure you have docker install in your computer. just clone the project from the repository https://github.com/Hasib-rafi1/trip.git
- run composer install , npm install, npm run dev.
- To run the project you simply need to run the command ./vendor/bin/sail up
- You can avoid the sail command also but to do that make sure you run those 
- php artisan key:generate
-  php artisan serve run  it will run server the 
-  you can run it in 80 port too. by running the command
-  php artisan serve --port=80
- make sure you are in the root folder. It will provide you the laravel application access.
- You can chose different ports and configuration make sure you update the docker-compose.yml and .env file
- To access please use the email: admin@tripbuilder.com and Pass: password

## Front End is totally independent project under trip-app folder.

- It is in the trip-app folder. simple react page
- make sure you have node install.
- npm install, npm start, it will  turn on port 3000
- Also make sure you added the host right in the app.js. 

## API details

- `/api/airports` Returns all the airport list
- `/api/airports?code=YVR` Returns all the airport list except the selected one
- `/api/airlines` Returns all the airlines list
- `/api/tripbuild?start_date=13-4-2021&retun_date=15-4-2021&deperture_from=YUL&arrival_from=YVR&two_way=true&by_price=true&page=1` Returns the list of possible trips both one and round trip.
- start_date departure_time
- retun_date departure_time for round trip
- deperture_from airport
- arrival_from airport
- two_way round trip
- by_priceprice waise sorting
- page - pagignation
- `/api/individual/trip?airline=AC&number=303&twoairline=AC&twonumber=306&two_way=true` for showing the trip Details
