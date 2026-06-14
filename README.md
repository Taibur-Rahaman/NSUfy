# NSUfy

A campus social network prototype for North South University (NSU) students — news feed, messaging, polls, faculty rankings, and user authentication.

## Overview

NSUfy is a full-stack web application that mimics a university-centric social platform. Students can browse a news feed, chat in message rooms, participate in polls, view top faculty listings, and manage accounts through a PHP backend with a static HTML/CSS frontend.

## Features

- **Authentication** — Sign up, login, forgot password
- **Home feed** — NSU notices and campus updates
- **News feed** — Social-style post browsing
- **Chatroom** — Messaging interface
- **Polls** — Interactive campus polls
- **Top Faculty** — Faculty ranking and discovery
- **Posts** — Create and view posts

## Tech Stack

### Frontend

- HTML5, CSS3, JavaScript
- Font Awesome icons
- Responsive page layouts (`Home`, `Login`, `Signup`, `Chatroom`, `Poll`, `Post`, `TopFaculty`, etc.)

### Backend

- PHP
- MySQL (PDO)
- REST-style endpoints for auth and user management

## Project Structure

```
NSUfy/
├── frontend/
│   ├── Home.html              # Main dashboard
│   ├── Login.html             # Login page
│   ├── signup.html            # Registration
│   ├── newsfeed.html          # News feed
│   ├── chatroom.html          # Messaging
│   ├── poll.html              # Polls
│   ├── Post.html              # Posts
│   ├── TopFaculty.html        # Faculty rankings
│   ├── forgot_password.html
│   ├── img/                   # UI assets
│   └── *_style.css            # Page-specific styles
└── backend/
    ├── database.php           # MySQL connection
    ├── login.php              # Login handler
    ├── signup.php             # Registration handler
    ├── forgot_password.php
    └── user_functions.php     # User utilities
```

## Prerequisites

- PHP 7.4+ with PDO MySQL extension
- MySQL or MariaDB
- XAMPP, WAMP, MAMP, or any Apache + PHP stack

## Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/Taibur-Rahaman/NSUfy.git
   cd NSUfy
   ```

2. Create a MySQL database named `user_authentication` (or update `backend/database.php` with your credentials).

3. Import or create the required user and content tables.

4. Copy the project into your web server's document root (e.g. `htdocs/nsufy/`).

5. Update `backend/database.php` if your MySQL host, username, or password differ from the XAMPP defaults:

   ```php
   $host = 'localhost';
   $dbname = 'user_authentication';
   $username = 'root';
   $password = '';
   ```

6. Open `http://localhost/nsufy/frontend/Home.html` (adjust path to match your setup).

## Development Notes

- Frontend pages are static HTML — open them through a local web server so PHP backend calls work correctly.
- Backend endpoints expect form POST requests from the login and signup forms.
- This is an academic prototype; production use would require security hardening (password hashing review, CSRF protection, prepared statements audit, HTTPS).

## Author

**Md Taibur Rahaman** — [GitHub](https://github.com/Taibur-Rahaman)

## License

MIT
