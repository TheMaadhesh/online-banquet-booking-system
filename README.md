# 🎪 Online Banquet Booking System (OBBS)

A full-featured **Online Banquet / Event Booking System** built with **PHP** and **MySQL**, featuring separate **Admin** and **User** panels for managing event bookings, services, and event types.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)

## 📖 About the Project

OBBS is a web application that allows users to browse banquet services, view event types, and book venues online, while admins can manage bookings, services, event types, and view all reservations through a dedicated admin dashboard.

## ✨ Features

**User Panel**
- User registration & login
- Browse available services and event types
- Book banquet/event slots online
- View booking status and history

**Admin Panel**
- Secure admin login
- Manage bookings (view / approve all bookings)
- Add & manage services
- Add & manage event types
- Manage "About Us" content
- Admin profile management

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL

## 📸 Screenshots

> Add screenshots here for a stronger impression — homepage, booking page, and admin dashboard work best.
>
> <img width="959" height="460" alt="Screenshot 2026-07-08 195619" src="https://github.com/user-attachments/assets/2f6bc159-bb4d-48d2-b770-4f3d25f1127e" />

<img width="959" height="539" alt="Screenshot 2026-07-08 195652" src="https://github.com/user-attachments/assets/9c10dc78-8a25-48ad-8190-faa99238dff3" />

<img width="959" height="539" alt="Screenshot 2026-07-08 195708" src="https://github.com/user-attachments/assets/6b8b9ebd-315b-430c-97bc-54b0e18c5583" />

<img width="959" height="539" alt="Screenshot 2026-07-08 195800" src="https://github.com/user-attachments/assets/5352c32e-a74e-4d01-9275-586ac8f78006" />




## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) / WAMP / LAMP (Apache + PHP + MySQL)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/online-banquet-booking-system.git
   ```

2. **Copy the project**
   Place the `obbs` folder inside your server's root directory:
   - XAMPP → `xampp/htdocs/`
   - WAMP → `wamp/www/`
   - LAMP → `/var/www/html/`

3. **Create the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `obbs`

4. **Import the database**
   - Import the `obbs.sql` file found inside the `SQL File` folder

5. **Run the project**
   - Visit `http://localhost/obbs`

### 🔑 Default Credentials

| Panel | Username | Password |
|-------|----------|----------|
| Admin | `Admin` | `Test@123` |

> You can also register as a new user from the application.

⚠️ **Note:** These are default demo credentials for local/development use only. Change them before deploying to a live/public server.

## 📂 Project Structure

```
obbs/
├── admin/          # Admin panel (dashboard, bookings, services, etc.)
├── includes/        # Shared PHP includes (DB connection, header, footer)
├── css/ js/ images/ # Frontend assets
├── SQL File/        # Database schema (obbs.sql)
└── *.php            # User-facing pages
```

## 🤝 Contributing

This is a personal/learning project. Suggestions and improvements are welcome via issues or pull requests.

## 📄 License

This project is open source and available for learning purposes.

---

⭐ If you found this project useful, consider giving it a star!
