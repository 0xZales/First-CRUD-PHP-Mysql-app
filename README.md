# PHP CRUD APP

This a simple app made with PHP and Mysql, it can perform CRUD operation. It's
the my first project using php :)

![Demo]('./img.png')

## Run Locally

Clone the project You shul create a database named `MARCHE` and table `hangar`
in `mysql`

```bash
CREATE DATABASE MARCHE;
```

```bash
CREATE TABLE hangar(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numero_hangar VARCHAR(20) NOT NULL,
    occupe VARCHAR(3) NOT NULL
    );
```

Clone the repository

```bash
  git clone https://github.com/0xZales/First-CRUD-PHP-Mysql-app.git my-project
```

Go to the project directory

```bash
  cd my-project
```

Run local php server

```bash
 php -S localhost:8000
```

and do to localhost:8000 in your web browser

## Authors

- [0xZales](https://github.com/0xZales)
