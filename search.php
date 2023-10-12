<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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
    <h1>Search Books</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <label for="search"></label>
         <input type="text" name="search" >
         <input type="submit" name="submit" value="Search">
         <button formaction = "index.php">Go to Book List</button>        
    </form>
    <?php
    $searchText = "";
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchText = $_POST["search"];
    

    $json_books = file_get_contents("booksList.json") ;
    $books_arr = json_decode($json_books, true);
    
    ?>

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
// echo $searchText;
    foreach($books_arr as $key => $value){
        
        if(($key+1)==$searchText || $books_arr[$key]['title']==$searchText || $books_arr[$key]['author']==$searchText || $books_arr[$key]['pages']==$searchText || $books_arr[$key]['isbn']==$searchText){
            // echo " ".$searchText ;
            // echo " ".($key+1) ;
            // echo " ".$books_arr[$key]['title'] ;
            // echo " ".$books_arr[$key]['author'] ;
            // echo " ".$books_arr[$key]['available'] ;
            // echo " ".$books_arr[$key]['pages'] ;
            // echo " ".$books_arr[$key]['isbn'] ;
            // echo "<br>";            
?> 

    <tr><td> <?php echo ($key+1) ?></td>
        <td> <?php echo  $books_arr[$key]['title'] ?> </td>
        <td> <?php echo  $books_arr[$key]['author'] ?> </td>
        <td> <?php
            if($books_arr[$key]['available']){
                echo "Yes";
            }
            else echo "No";
        ?> </td>
        <td> <?php echo  $books_arr[$key]['pages'] ?> </td>    
        <td> <?php echo  $books_arr[$key]['isbn'] ?></td>    
    </tr>      
 <?php
} } }
?>    
</table>
</body>
</html>