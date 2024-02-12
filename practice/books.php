<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>List of Books</h1>
    <?php
        // Example array of books
        $books = [
            [
                'name' => '1984',
                'author' => 'George Orwell',
                'year' => 1949
            ],
            [
                'name' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'year' => 1960
            ],
            [
                'name' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'year' => 1925
            ]
        ];

        // Function to display books
        function displayBooks($booksArray) {
            echo '<table>';
            echo '<tr><th>Name</th><th>Author</th><th>Year</th></tr>';
            foreach ($booksArray as $book) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($book['name']) . '</td>';
                echo '<td>' . htmlspecialchars($book['author']) . '</td>';
                echo '<td>' . htmlspecialchars($book['year']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        // Call the function to display books
        displayBooks($books);
    ?>
</body>
</html>
