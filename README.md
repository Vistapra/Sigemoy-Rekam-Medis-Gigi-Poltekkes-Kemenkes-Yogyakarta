# Sigemoy Rekam Medis Gigi - Poltekkes Kemenkes Yogyakarta

## Table of Contents

-   [Introduction](#introduction)
-   [Features](#features)
-   [Technology Stack](#technology-stack)
-   [Installation](#installation)
-   [Usage](#usage)
-   [API Endpoints](#api-endpoints)
-   [Authentication](#authentication)
-   [Contributing](#contributing)
-   [License](#license)

## Introduction

Sigemoy Rekam Medis Gigi is a comprehensive dental medical record management system developed for Poltekkes Kemenkes Yogyakarta. This application aims to streamline the process of managing dental patient records, appointments, treatments, and related medical data.

## Features

1. **Multi-user Authentication System**

    - Supports multiple user roles (Admin, Doctor, Staff, Health Cadre, Dental Therapist)
    - Secure login and logout functionality

2. **Dashboard**

    - Overview of key metrics and recent activities

3. **Patient Management**

    - Add, edit, and delete patient records
    - View patient history and files

4. **Doctor Management**

    - Add, edit, and delete doctor profiles
    - Password management for doctor accounts

5. **Staff Management**

    - Add, edit, and delete staff records

6. **Medical Records**

    - Create and manage dental medical records
    - Support for odontogram (dental chart)
    - Record examinations, treatments, diagnoses, and prescriptions

7. **Medication Management**

    - Inventory tracking for medications
    - Prescription management

8. **ICD (International Classification of Diseases) Integration**

    - Manage ICD codes for standardized diagnosis recording

9. **Treatment Management**

    - Add, edit, and delete dental treatments

10. **TOGA (Traditional Medicine) Management**

    - Record and manage traditional medicine information

11. **Educational Content Management**

    - Create and manage educational materials for patients

12. **Questionnaire System**

    - Create, manage, and analyze patient questionnaires

13. **Health Cadre Records**

    - Special module for health cadre to record community health data

14. **Reporting and Analytics**
    - Generate reports on various aspects of the dental practice
    - Export functionality for data analysis

## Technology Stack

-   Backend: PHP with Laravel framework
-   Frontend: Likely uses Laravel Blade templating (not explicitly shown in the provided code)
-   Database: Not specified, but likely MySQL or PostgreSQL (common with Laravel)
-   Authentication: Laravel's built-in authentication system

## Installation

1. Clone the repository:

    ```
    git clone https://github.com/Vistapra/Sigemoy-Rekam-Medis-Gigi-Poltekkes-Kemenkes-Yogyakarta.git
    ```

2. Navigate to the project directory:

    ```
    cd sigemoy-rekam-medis-gigi
    ```

3. Install PHP dependencies:

    ```
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your environment variables:

    ```
    cp .env.example .env
    ```

5. Generate an application key:

    ```
    php artisan key:generate
    ```

6. Run database migrations:

    ```
    php artisan migrate
    ```

7. Seed the database (if seeders are available):

    ```
    php artisan db:seed
    ```

8. Start the development server:
    ```
    php artisan serve
    ```

## Usage

After installation, you can access the application at `http://localhost:8000`. Use the appropriate login credentials based on your role (Admin, Doctor, Staff, etc.).

## API Endpoints

The application provides various API endpoints for different functionalities. Here are some key routes:

-   Authentication: `/multilogin`, `/loginkader`, `/loginterapis`
-   Dashboard: `/dashboard`
-   Patient Management: `/pasien/*`
-   Doctor Management: `/dokter/*`
-   Medical Records: `/rekam/*`
-   Medication Management: `/obat/*`
-   ICD Management: `/icd/*`
-   Treatment Management: `/tindakan/*`
-   TOGA Management: `/toga/*`
-   Education Management: `/edukasi/*`
-   Questionnaire Management: `/kuisioner/*`
-   Health Cadre Records: `/rekammediskaderkesehatan/*`

For a complete list of endpoints, refer to the `routes/web.php` file in the project.

## Authentication

The application uses Laravel's built-in authentication system. Different user roles have access to different parts of the system. Middleware is used to protect routes based on user authentication.

## Contributing

Contributions to the Sigemoy Rekam Medis Gigi project are welcome. Please follow these steps to contribute:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

---

For more information or support, please contact [insert contact information].
