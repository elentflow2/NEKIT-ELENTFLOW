<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row =>
                    row.some(cell => cell !== '' && cell !== null && cell !== undefined)
                );

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script><?php
$generating_patterns = [
    ["name" => "Фабричный метод", "link" => "lab2/Generating_patterns/FactoryMethod.php"],
    ["name" => "Абстрактная фабрика", "link" => "lab2/Generating_patterns/AbstractFactory.php"],
    ["name" => "Строитель", "link" => "lab2/Generating_patterns/Builder.php"],
    ["name" => "Прототип", "link" => "lab2/Generating_patterns/Prototype.php"],
    ["name" => "Одиночка", "link" => "lab2/Generating_patterns/Singleton.php"],
];

$structural_patterns = [
    ["name" => "Адаптер", "link" => "lab2/Structural_patterns/Adapter.php"],
    ["name" => "Мост", "link" => "lab2/Structural_patterns/Bridge.php"],
    ["name" => "Компоновщик", "link" => "lab2/Structural_patterns/Composite.php"],
    ["name" => "Декоратор", "link" => "lab2/Structural_patterns/Decorator.php"],
    ["name" => "Фасад", "link" => "lab2/Structural_patterns/Facade.php"],
    ["name" => "Легковес", "link" => "lab2/Structural_patterns/Flyweight.php"],
    ["name" => "Заместитель", "link" => "lab2/Structural_patterns/Proxy.php"],
];

$behavioral_patterns = [
    ["name" => "Цепочка обязанностей", "link" => "lab2/Behavioral_patterns/ChainofResponsibility.php"],
    ["name" => "Команда", "link" => "lab2/Behavioral_patterns/Command.php"],
    ["name" => "Итератор", "link" => "lab2/Behavioral_patterns/Iterator.php"],
    ["name" => "Посредник", "link" => "lab2/Behavioral_patterns/Mediator.php"],
    ["name" => "Снимок", "link" => "lab2/Behavioral_patterns/Memento.php"],
    ["name" => "Наблюдатель", "link" => "lab2/Behavioral_patterns/Observer.php"],
    ["name" => "Состояние", "link" => "lab2/Behavioral_patterns/State.php"],
    ["name" => "Стратегия", "link" => "lab2/Behavioral_patterns/Strategy.php"],
    ["name" => "Шаблонный метод", "link" => "lab2/Behavioral_patterns/TemplateMethod.php"],
    ["name" => "Посетитель", "link" => "lab2/Behavioral_patterns/Visitor.php"],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа № 2 Паттерны проектирования</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e8f0fe;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #1e3a8a;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar h1 {
            font-size: 1.5em;
            margin: 0 0 20px;
            text-align: center;
        }
        .sidebar h2 {
            font-size: 1.2em;
            margin: 20px 0 10px;
            color: #93c5fd;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 8px 0;
        }
        .sidebar ul li a {
            color: #bfdbfe;
            text-decoration: none;
            font-size: 0.95em;
        }
        .sidebar ul li a:hover {
            color: #60a5fa;
            text-decoration: underline;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
            background: #fff;
        }
        .main-content h2 {
            color: #1e3a8a;
            font-size: 1.8em;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: #1e3a8a;
            color: #fff;
            margin-left: 250px;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 220px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1>Лабораторная работа № 2</h1>
            <h2>Порождающие паттерны</h2>
            <ul>
                <?php foreach ($generating_patterns as $index => $pattern): ?>
                    <li><a href="<?= htmlspecialchars($pattern['link']) ?>"><?= ($index + 1) . '. ' . htmlspecialchars($pattern['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Структурные паттерны</h2>
            <ul>
                <?php foreach ($structural_patterns as $index => $pattern): ?>
                    <li><a href="<?= htmlspecialchars($pattern['link']) ?>"><?= ($index + 1) . '. ' . htmlspecialchars($pattern['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2>Поведенческие паттерны</h2>
            <ul>
                <?php foreach ($behavioral_patterns as $index => $pattern): ?>
                    <li><a href="<?= htmlspecialchars($pattern['link']) ?>"><?= ($index + 1) . '. ' . htmlspecialchars($pattern['name']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <h2><a href="index.php">Назад в главное меню</a></h2>
        </div>
        <div class="main-content">
            <h2>Паттерны проектирования</h2>
            <p>Выберите категорию и паттерн из бокового меню для просмотра примеров.</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Лабораторная работа № 2</p>
    </footer>
</body>
</html>