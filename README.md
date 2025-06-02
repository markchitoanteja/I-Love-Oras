# I Love Oras - Tourism & Community Portal 🌴

A web-based tourism and community portal for **Oras, Eastern Samar**, developed with **CodeIgniter 4**. This project showcases the town’s attractions, culture, news, and local government initiatives — offering residents and tourists a centralized online experience.

> 🛠️ Built with ❤️ by [Mark Chito Anteja](https://github.com/your-github-username)

---

## 🌐 Live Site
[https://i-love-oras.essuc.online](https://i-love-oras.essuc.online)

---

## 🚀 Features
- 🗺️ Dynamic pages for tourism attractions
- 📰 News and updates from the LGU
- 📅 Events & festivals (e.g., Pakol Festival)
- 📷 Media gallery
- 🛠️ Admin panel for content management
- 🔒 Role-based authentication system

---

## 📦 Tech Stack
- **Backend**: PHP (CodeIgniter 4)
- **Frontend**: HTML5, CSS3, Bootstrap
- **Database**: MySQL
- **Server**: Apache (XAMPP-friendly)

---

## 🖥️ Local Setup using XAMPP

Follow these steps to get the project running on your local machine:

### 📁 1. Clone the Repository
```bash
git clone https://github.com/your-github-username/i-love-oras.git
```

### 🗂️ 2. Move to XAMPP `htdocs` Directory
```bash
mv i-love-oras/ C:/xampp/htdocs/
```

Or manually copy the folder into:
```
C:\xampp\htdocs\i-love-oras
```

### 🗃️ 3. Create MySQL Database
1. Open `phpMyAdmin` (http://localhost/phpmyadmin)
2. Create a new database:
   ```
   iloveoras_db
   ```
3. Import the provided SQL dump file (usually under `/database/` or `/sql/` folder of the project)

### ⚙️ 4. Configure `.env` File
1. Copy `.env.example` to `.env`
2. Set your database credentials:
   ```env
   database.default.hostname = localhost
   database.default.database = iloveoras_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

### 📌 5. Set Base URL
Still in the `.env` file:
```env
app.baseURL = 'http://localhost/i-love-oras/public/'
```

### 🧼 6. Clear Caches & Migrate
```bash
php spark cache:clear
php spark migrate
php spark db:seed
```

*(Make sure you're in the project directory and have PHP configured in your PATH)*

### ▶️ 7. Run the App
Visit [http://localhost/i-love-oras/public](http://localhost/i-love-oras/public)

---

## 🛡️ Security Note
For production, remember to:
- Remove development tools (`spark` routes, debug settings)
- Move out of `public/` via `.htaccess` rewrite or virtual host
- Configure HTTPS properly

---

## 🤝 Contributing
PRs and suggestions are welcome. Fork it, build something, and submit a pull request!

---

## 📄 License
This project is open-source under the [MIT License](LICENSE).
