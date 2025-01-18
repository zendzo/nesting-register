# Nesting Register Monitoring System

The **Nesting Register Monitoring System** is a web-based application designed to efficiently record and monitor the nesting process for production. It provides streamlined data management for registrations, transmittals, progress tracking, activity logs, and file management. This project is being developed as a personal initiative to explore advanced database design, automation, and rapid prototyping using modern web technologies.

---

## 🛠 Features
- **Comprehensive Data Management**: Register, transmittals, project tracking, and drawing revisions.
- **Progress Monitoring**: Real-time updates on nesting progress and operator remarks.
- **Activity Logs**: Detailed logging of user actions for audit and traceability.
- **File Management**: Centralized file storage with status updates.
- **User & Role Management**: Define roles (e.g., Admin, Operator, Manager) for better control.

---

## 🗂 Database Structure
The system leverages a well-structured, normalized database schema designed for scalability and efficiency.  
Key tables include:
- **Register**: Core table for nesting activity records.
- **Transmittal**: Manages material, quantity, and cutting statuses.
- **Drawing & Revisions**: Tracks drawing metadata and revision history.
- **Logs**: Records user actions with timestamps for traceability.
- **Projects & Participants**: Links companies and roles to specific projects.

For detailed table relationships, check the ERD file in the repository.

---

## ⚙️ Tech Stack
This project utilizes the following technologies to enable rapid prototyping and robust development:
- **[Laravel](https://laravel.com/)**: A powerful PHP framework for backend development.
- **[Livewire](https://laravel-livewire.com/)**: Enables dynamic, reactive components without leaving the Laravel ecosystem.
- **[Filament](https://filamentphp.com/)**: A modern admin panel builder for quick prototyping and management.
- **Database**: MySQL or PostgreSQL for relational data storage.

---

## 🚀 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/nesting-register-system.git
   cd nesting-register-system
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Configure the `.env` file with your database and server settings:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Start the development server:
   ```bash
   php artisan serve
   npm run dev
   ```

---

## 📌 Current Status
The project is currently in the **analysis and prototyping phase**. The database schema and ERD have been finalized, and the web-based system is being developed.

---

## 🤝 Contributing
Contributions, suggestions, and feedback are welcome! Feel free to:
- Open an issue for bug reports or feature requests.
- Fork the repository and submit a pull request for improvements.

---

## 📧 Contact
For inquiries or collaboration opportunities, reach out via LinkedIn: [Your LinkedIn Profile](https://www.linkedin.com/in/yourusername).

---

## 📜 License
This project is licensed under the [MIT License](LICENSE).

---

## 🎯 Roadmap
- [x] Database design and ERD finalization.
- [ ] Develop core features (Register, Transmittal, Drawing).
- [ ] Implement user authentication and role-based access control.
- [ ] Add progress tracking and activity logs.
- [ ] Finalize file management with server integration.
- [ ] Deploy prototype for testing and feedback.

---

Let’s build something great together! 🚀
```
