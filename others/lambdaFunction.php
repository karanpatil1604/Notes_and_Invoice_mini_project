<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: small;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <h1>
        <?php
        $books = [
            [
                'name' => "Do Androids Dream of Electric Sheep",
                'author' => "Philip K. Dick",
                'releaseYear' => 1968,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'The Langoliers',
                'author' => "Andy Weir",
                'releaseYear' => 2021,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => "The Martian",
                'author' => "Andy Weir",
                'releaseYear' => 2011,
                'purchaseUrl' => 'http://example.com'
            ],

        ];

        $filterByAuthor = function ($books, $author) {
            $filtredBooks = [];
            foreach ($books as $book) {
                if ($book['author'] === $author) {
                    $filtredBooks[] = $book;
                }
            }
            return $filtredBooks;
        };

        $filtredBooks = $filterByAuthor($books, 'Philip K. Dick');
        ?>

        <ul>
            <?php foreach ($filtredBooks as $book): ?>

                <a href="<?= $book['purchaseUrl'] ?>">
                    <li>
                        <?= $book['name'] ?>(
                        <?= $book['releaseYear'] ?>) By
                        <?= $book['author'] ?>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
</body>

</html>