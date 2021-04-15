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
- Server-side application(s) is written in PHP (Laravel)
- CRUD operation for FLIGHT,AIRPORT,AIRLINES are done using laravel and blade
- Authentication is done with Laravel Breeze
- To access please use the email: admin@tripbuilder.com and Pass: password
- Can be used any database, all the migrations file are ready.
- But for simplicity I am using SQLITE. It is in root folder as a back up as well as in database folder. If you want use with pre define data please copy the root database.sqlite file into the database folder.
- To run the project you need make sure you have docker install in your computer. just clone the project from the repository https://github.com/Hasib-rafi1/tripbuilder

- To run the the project you simply need to run the commmand ./vendor/bin/sail up
- make sure you are in the root folder. It will provide you the laravel application access.
- You can chose different ports and configuration make sure you update the docker-compose.yml and .env file
