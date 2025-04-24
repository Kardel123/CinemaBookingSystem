# Cinema Booking System 🎬

A modern, Netflix-inspired cinema ticket booking system built with Laravel and Tailwind CSS.

## Features ✨

- **Modern UI/UX**: Sleek, Netflix-inspired design with a dynamic movie poster background
- **Responsive Design**: Fully responsive layout that works on all devices
- **Interactive Elements**: 
  - Smooth hover effects
  - Dynamic brand logo transitions
  - Beautiful backdrop blur effects
- **Authentication System**: Secure user login and registration system
- **Movie Integration**: Integration with popular movie platforms and rating systems

## Tech Stack 🛠️

- **Backend**: Laravel PHP Framework
- **Frontend**: 
  - Tailwind CSS for styling
  - Alpine.js for interactivity
  - Blade templating engine
- **Assets**: 
  - SVG logos for crisp display
  - Dynamic movie poster grid
  - Responsive image handling

## Getting Started 🚀

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

### Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/cinema-booking-system.git
cd cinema-booking-system
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM packages
```bash
npm install
```

4. Create and configure your environment file
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`

6. Run migrations
```bash
php artisan migrate
```

7. Link storage
```bash
php artisan storage:link
```

8. Start the development server
```bash
php artisan serve
```

9. In a new terminal, start Vite for asset compilation
```bash
npm run dev
```

## Contributing 🤝

Contributions are welcome! Please feel free to submit a Pull Request.

## License 📝

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments 🙏

- Netflix for design inspiration
- Movie rating platforms (IMDB, Rotten Tomatoes, Metacritic)
- Streaming services (Netflix, HBO Max, Disney+) for brand partnerships
