# LAMP test

## Task One

Run `./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests`.

The tests are failing!

Let's fix that without changing the tests.

## Task Two

Write a document describing any problems you see in `src/Feedback.php` and how we should go about fixing them.

## Task 3: Database: "What's wrong with this code?"

---
<?php
$host = 'mysql';

$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $stmt = $pdo->query("SELECT * FROM users WHERE user_name={$_GET['name']}");
    while ($row = $stmt->fetch())
    {
        echo $row['name'] . "\n";
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
---
## Submitting solutions

1. Clone the repository
2. Complete the tasks
3. Commit your work
4. Generate patch file(s) using `git format-patch -M origin/master`
5. E-mail those patch files back to us

We'd appreciate it if you keep your submission private and not fork this repository.
