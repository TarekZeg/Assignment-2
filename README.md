# Project Overview

This project is a web application for managing a Futsal University League. The application allows administrators to efficiently organize and manage futsal teams, players, match schedules, and results. It provides features such as CRUD operations on teams, players, and match data, search functionality, pagination, and dynamic team standings.

## Features and Functionality

### Team Management (CRUD)
- Admins can create, update, and delete teams participating in the futsal league.
- Each team has basic details like team name and match statistics (wins, losses, etc.).
- **Search**: Allows admins to search for teams by name for quick lookups.
- **Pagination**: Teams are displayed in a paginated list for easy browsing, especially when there are many teams.
- **Standings**: Team standings are dynamically generated based on points (win = 3, draw = 1, loss = 0) and goal difference (goals scored - goals conceded).
  - Teams are sorted first by points (descending), and then by goal difference (descending) using the `sortByDesc()` method.

## Additional Features and Good Practices

### Validation
- Form submissions for creating and updating teams include validation rules to ensure data integrity (e.g., checking if team name, wins, losses, etc. are correctly filled out).
- Validation is handled using Laravel’s built-in validation system to prevent invalid or incomplete data from being saved to the database.

### Eloquent ORM
- The application uses Laravel’s Eloquent ORM for database interaction. This provides a clean, efficient, and intuitive way to manage model data without writing raw SQL queries.

### Pagination
- Pagination is implemented using Laravel’s `paginate()` function to display a limited number of teams per page, improving performance and usability.
- Example: `$teams = League::paginate(4);` will show 4 teams per page, with automatic pagination links in the view (`{{$teams->links()}}`).

## Summary

The Futsal University League application allows easy management of teams and standings using Laravel. Key features include:
- CRUD operations for teams and players
- Search and pagination for quick team lookups
- Dynamic standings based on match results
- Best practices such as data validation and Eloquent ORM usage

This application ensures a smooth user experience while efficiently managing league data.
