
# Project Overview
This project is an enhanced Laravel web application designed for managing a Futsal University League by incorporating advanced web technologies and techniques. The application now offers additional features such as improved authentication and authorisation, database relationships, responsive design, and integration with modern tools like Bootstrap for CSS.

## Features Implemented

### Authentication and Authorization
This feature uses Laravel's built-in authentication system to manage user access. Middleware is used to restrict access based on user roles, such as admins and normal users (e.g., players). This ensures secure, role-based access control by customizing access to specific features. The `can('edit')` gate is implemented to give admins the ability to perform actions that are restricted for normal users. Normal users cannot create, edit, or delete teams or players, while admins have full CRUD access.

Two roles are defined: one for normal users and another for admins. Admins can assign the admin role to other users through the user management page. Additionally, access to team and player cards is restricted for users who are not logged in, ensuring secure control over the application's resources.

### Eloquent Relationships
The application uses Eloquent ORM to establish relationships between database tables. For example, a one-to-many relationship exists between `futsal_standings` and `players`.

### CSS Framework Integration
Bootstrap was utilised for styling the application. This integration allowed the use of a pre-defined grid system, components, and utility classes to create a responsive and professional design. By adopting Bootstrap, the styling process became more efficient, offering a range of ready-made UI elements, forms, and navbar styling. For the responsive design, it has been used to make the navbar responsive as a sidebar with a menu button that displays all the sidebar’s elements. A quick and efficient way to ...

### JavaScript
A live suggestion search bar was implemented to enhance the user experience by providing real-time search results as users type. This feature dynamically displays relevant suggestions or matches based on the input, enabling admins to find usernames without needing to write down the full username. The search bar utilises efficient algorithms and asynchronous requests to ensure speed and accuracy. This search bar improves usability and reduces search time.

The script:
```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
```
enables the responsive functionality of a Bootstrap navbar. It powers interactive features like dropdown menus and the collapsible hamburger menu for smaller screens. By handling these interactions, the script ensures the navbar adapts seamlessly to different devices, enhancing usability and responsiveness.

### Responsive Design
The application ensures usability across various devices by leveraging Tailwind's utility classes to create a responsive layout. This feature makes the app accessible to a broader audience, particularly mobile users. Further testing is recommended to ensure compatibility across different browsers.

## Database Design

### Schema Overview
The database design includes tables such as:
- **Users Table**: Manages authentication and role-based access.
- **Futsal_standings Table**: Stores team details.
- **Players Table**: Tracks player profiles and their associations with teams.

### Normalization
The database follows normalization principles to minimize redundancy and ensure data integrity, resulting in a scalable and efficient structure.

## Challenges Faced

### Role-Based Access Control
One challenge was managing complex middleware rules for role-based access control. This was addressed by implementing Laravel's Gate and Policy mechanisms.

### Real-Time Updates
Another challenge involved configuring Vue.js for real-time updates, which required integrating Laravel Echo and Pusher.

### Testing
Writing comprehensive tests posed difficulties, but focusing on critical features like authentication and database integrity helped overcome this.

## Conclusion
This enhanced Laravel web application demonstrates effective use of advanced web technologies and tools. By integrating features like authentication and authorisation, Eloquent relationships, responsive design, and dynamic interactivity, it provides a robust and user-friendly platform for managing the Huddersfield University Futsal League.
