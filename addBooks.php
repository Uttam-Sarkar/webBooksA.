<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    <h3>Give book's information:</h3>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>Title:
        <input type="text" name="title"></p>
        <p>
        Author Name:
        <input type="text" name="author"></p>
        <p>
        Available:
        <input type="radio" id="yes" name="available" value="true">
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="available" value="false">
        <label for="no">No</label><br>
        </p>
        <label for="pages">Pages:</label>
        <input type="number" id="quantity" name="pages" min="0" ><br>
        <p>
        <label for="isbn">Isbn No:</label>
        <input type="number" id="quantity" name="isbn" min="0" >
        </p>
        <input type="submit" name="submit" value="Add">

        <button formaction = "index.php">Go to Book List</button>        
    </form>

    <?php
    $title = $author = $available = $pages = $isbn = "";
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $available = $_POST["available"];
        $available = (bool)$available;
        $pages = $_POST["pages"];
        $pages = (int)$pages;
        $isbn = $_POST["isbn"];
        $isbn = (int)$isbn;
    } 

    $json_books = file_get_contents("booksList.json") ;
    $books_arr = json_decode($json_books, true);

    $login = true;
    
    foreach($books_arr as $key => $value){
        if($books_arr[$key]['title']==$title && $books_arr[$key]['author']==$author){
            $login = false;
            break;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($login){
            //add data
            $books_arr[] = array('title'=>$title, 'author'=>$author, 'available'=>$available, 'pages'=>$pages, 'isbn'=>$isbn );
            // array_merge($books_arr, $new_arr);
            file_put_contents('booksList.json', json_encode($books_arr));
            echo "<h2>Book added successfully!</h2>";
            exit;
        }else{
            echo "<h3>This Book is already Exist.</h3>";
        }
    }
    ?>
    
</body>
</html>