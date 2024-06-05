# DisasterMY

## Objective of the Project
This system aims to collect disaster information from reports by organizations and the public and visualize this data on a map. Additionally, the system provides a rain distribution map to give users a view of past and forecasted rain distribution data. Users can also view disaster-related tweets about the latest disasters, as well as tweets published by MET Malaysia (Jabatan Meteorologi Malaysia).

## Features
- **Disaster Map:** Visualizes disaster information from various reports.
- **Rain Map:** Displays past and forecasted rain distribution data.
- **Disaster List:** Lists reported disasters for user reference.
- **Disaster-Related Tweets:** Shows latest disaster-related tweets and tweets from MET Malaysia.

## Technologies Used
- PHP Laravel
- MySQL
- JavaScript
- HTML/CSS
- Twitter API (Note: Twitter API key expired, Twitter section currently unavailable)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/april-EXO/DisasterMY.git
   cd DisasterMY
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Copy .env.example to .env:**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Configure your .env file:**
   - Set your database connection details.
   - Add any other necessary configurations.

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Compile assets:**
   ```bash
   npm run dev
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

## Usage

1. Access the application via `http://localhost:8000`.
2. Navigate through the disaster map, rain map, and disaster list.
3. View disaster-related tweets and updates from MET Malaysia.

## Demo

A simple demo video is available [here](https://drive.google.com/file/d/1yNO6kqnItAYFV9yp3RvHEzgt5VwN2TUv/view?usp=sharing).

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a pull request.


## Contact

For any questions or inquiries, please contact April at hsy.k10@gmail.com .

