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
            background-color: #EF5353;
        }
    </style>
</head>
<body>
    <h1>Delete Book</h1>
    To delete a Book Press<b>"<u> Delete</u>" </b>
<table>
    <tr>
        <th>Id no.</th>
        <th>Title</th>
        <th>Author</th>
        <th>Action</th>        
    </tr>
<?php
    $json_books = file_get_contents('booksList.json');
    $books = json_decode($json_books, true);

    foreach($books as $key => $value){
?> 
    <tr><td> <?php echo ($key+1) ?></td>
        <td> <?php echo  $books[$key]['title'] ?> </td>
        <td> <?php echo  $books[$key]['author'] ?> </td>
        <td><a href="actionDelete.php?id=<?php echo $key?>">Delete</a></td>
    </tr> 
<?php } ?>
</table>  
<form>
    <button formaction = "index.php">Go to Book List</button>        
</form>
</body>
</html>