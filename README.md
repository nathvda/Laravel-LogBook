# Laravel-LogBook
A small project I made on the way of learning laravel.

## Welcome to this repository.

My name is Nathalie and I am an Junior Web Developer. I have been learning Laravel for a few days and decided to start a small project that will be a **log book** allowing you to store entries, like a diary would. I will try and add functionalities as time goes by, but for now, this is essentially what this project with do.

## Technologies I used.

- Laravel (vite)
- Sass
- LiveWire

## Known issues

- No issues known at the moment.

## Planned

- [ ] Allow to add a title

## Versions 

- 2023-03-04
- - Added a very simple messaging system.
- - Using LiveWire to allow for updates.

- 2023-03-03
- - Added basic friends system.
- - Added a random post page (gets one entry randomly).
- - Updated menu with icons.
- - Added a word counter in the entry creation mode.

- 2023-03-01 
- - First version. Added possibility to add entries and select a location for your entry.
- - Added page displaying posts by location.
- - Added a search bar (looks up for searched term anywhere in the post or title).
- - Added authentification.

## Installation 

You will need a database to store your entries. You can go to the ```.env``` file and fill it according to your configuration.

- Update ```.env``` file according to your configuration especially the database name except if your create the navigationlog database previously.
- Run ```composer install``` to install the dependencies.
- Run ```npm install``` to install the dependencies.
- Run ```php artisan serve``` to run the project.
- Run ```npm run dev``` in the project folder.
- Run the migrations with ```php artisan migrate``` to create the database tables.

You should be good to go !