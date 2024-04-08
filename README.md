<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Online Auction Platform

Welcome to our Online Auction Platform! This platform provides an exciting and interactive environment for users to participate in auctions for various items.

## Features

### Item Listings
Users can view a variety of items listed for auction on the platform.

### Bidding Functionality
Users can place bids on items they are interested in.
Real-time bidding allows users to see current highest bids instantly.

### Notifications
Users receive notifications about competing bids to stay engaged in the bidding process.

### Winner Determination
At the end of the auction period, the highest bidder for each item wins that item.
Winners are automatically determined by the system.
Automatic notifications are sent to winners.

## Technologies Used
Laravel PHP Framework
Jquery
Pusher for real-time updates

To set up the project, follow the steps below:

1. Clone the Repository: Clone this repository to your local machine:

```bash
git clone https://github.com/aakankshakirar/online_auction.git
```


2. Install Dependencies: Navigate to the project directory and install PHP dependencies using Composer:
```bash
composer install
```

3. Database Setup: Configure the database connection in the .env file and create a MySQL database.

4. Run Migrations and Seeders: Run database migrations and seeders to set up the database schema and populate initial data:

```bash
php artisan migrate --seed
```
5. Serve the application

```bash
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
