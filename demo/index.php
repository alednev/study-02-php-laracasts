<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>
<?php
$books = [
    [
        'name'        => 'Do Androids Dream of Electric Sheep',
        'author'      => 'Philip K. Dick',
        'releaseYear' => 1968,
        'purchaseUrl' => 'http://example.com',
    ],
    [
        'name'        => 'The Langoliers',
        'author'      => 'Stephen King',
        'releaseYear' => 1990,
        'purchaseUrl' => 'http://example.com',
    ],
    [
        'name'        => 'Hail Mary',
        'author'      => 'Andy Weir',
        'releaseYear' => 2021,
        'purchaseUrl' => 'http://example.com',
    ],
    [
        'name'        => 'The Martian',
        'author'      => 'Andy Weir',
        'releaseYear' => 2011,
        'purchaseUrl' => 'http://example.com',
    ]
];

$movies = [
    [
        'title' => 'The Green Mile',
        'year'  => 1999,
    ],
    [
        'title' => 'The Shawshank Redemption',
        'year'  => 1994,
    ],
    [
        'title' => 'Forrest Gump',
        'year'  => 1994,
    ],
    [
        'title' => 'The Lord of the Rings: The Return of the King',
        'year'  => 2003,
    ],
    [
        'title' => 'Interstellar',
        'year'  => 2014,
    ],
];

function filterByAuthor($books, $author) {
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['author'] === $author) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
}

function filterMoviesByYear($movies, $year) {
    $filteredMovies = [];

    foreach ($movies as $movie) {
        if ($movie['year'] >= $year) {
            $filteredMovies[] = $movie;
        }
    }

    return $filteredMovies;
}
?>

<h1>Recommended books</h1>

<ul>
    <?php foreach (filterByAuthor($books, 'Philip K. Dick') as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl'] ?>">
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<h1>Recommended movies</h1>

<ul>
    <?php foreach (filterMoviesByYear($movies, 2000) as $movie) : ?>
        <li>
            <?= $movie['title'] ?> (<?= $movie['year'] ?>)
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>