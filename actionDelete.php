<?php 
 
	$id = $_GET['id'];

    $json_books = file_get_contents("booksList.json") ;
    $books_arr = json_decode($json_books, true);
    unset($books_arr[$id]);
    
	$books_arr = json_encode($books_arr, JSON_PRETTY_PRINT);
	file_put_contents('booksList.json', $books_arr);
    header('Location: delete.php');
            exit;
 
?>