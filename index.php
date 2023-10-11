<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookList</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            background-color: #96D4D4;
        }
    </style>
</head>
<body>

    <h1>Book List</h1>
    <form>
         <button formaction="addBooks.php">Add new book</button>
         <button formaction="delete.php">Delete book</button>
    </form>
    
<table>
    <tr>
        <th>Id no.</th>
        <th>Title</th>
        <th>Author</th>
        <th>Available</th>
        <th>Pages</th>
        <th>Isbn</th>        
    </tr>
<?php
    $json_books = file_get_contents('booksList.json');
    $books = json_decode($json_books, true);

    foreach($books as $key => $value){
?> 
    <tr><td> <?php echo ($key+1) ?></td>
        <td> <?php echo  $books[$key]['title'] ?> </td>
        <td> <?php echo  $books[$key]['author'] ?> </td>
        <td> <?php echo  $books[$key]['available'] ?> </td>
        <td> <?php echo  $books[$key]['pages'] ?> </td>    
        <td> <?php echo  $books[$key]['isbn'] ?></td>    
    </tr>      
 <?php } ?>    
</table>  
</body>
</html>