# Sahara Events

This is a PHP-based web application that displays events. The application uses sessions and interacts with a database to fetch and display event details.

## Project Structure

The project is structured as follows:

- `index.php`: The main entry point of the application. It starts a session, includes necessary files, and displays the home page.
- `db_config.php`: Contains the configuration for the database connection.
- `home_logic.php`: Contains the logic for fetching and processing event data.
- `header.php`: Contains the HTML for the header of the website.
- `event_details.php`: A page that shows more details about an event when a user clicks on "MORE DETAILS".

## Setup

1. Clone the repository.
2. Set up your database and update the `db_config.php` file with your database connection details.
3. Run the application on a server that supports PHP (like Apache).

## Usage

Navigate to the `index.php` page in your web browser. You will see a list of events. You can click on "MORE DETAILS" for any event to see more information about that event.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)