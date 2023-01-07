<html>
<link rel="stylesheet" href="css/style.css">
<body>
<?php
include "includes/header.php";
?>
<blockquote>
<div class="container">
<center><h1>Read XML Data</h1></center>
<?php
$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<book>
<author>Isak Azim</author>
<name>Begin of spirit</name>
</book>
";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
//echo $xml->getName() . "<br>";

foreach($xml->children() as $child){
//echo $child->getName() . ": " . $child . "<br>";
    if($child->getName() == 'author'){
        $sql = "SELECT id,AuthorName FROM authors WHERE AuthorName = '".$child."'";
        $result = $conn->query($sql);
        $id = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
        }
        if($id == 0){
         $sql = "INSERT INTO authors(AuthorName) VALUES('".$child."')";
         $conn->query($sql); 
        }
        else{
            $sql = "SELECT id FROM authors WHERE AuthorName = '".$child."'";
            $result = $conn->query($sql);
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $aid = $row['id'];
        } 
        }
    }
    if($child->getName() == 'name'){
        $sql = "SELECT id FROM books WHERE authorid = '".$aid."' and bookname = '".$child."'";
        $result = $conn->query($sql);
        $bid = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $bid = $row['id'];
        }
        if($bid == 0){
        $sql = "INSERT INTO books(bookname,authorid) VALUES('".$child."','".$aid."')";
        $conn->query($sql);
        }  
    }
}
?>

<?php
$sql = "SELECT * FROM books,authors where authors.id = books.authorid";
$result = $conn->query($sql);
?>
<table id='myTable' style='width:100%; float:left; border:1px;'>
<?php while($row = $result->fetch(PDO::FETCH_ASSOC)) {?> 
<tr>
  
    <td style="padding: 5px;"> <?php echo $row["AuthorName"] ?></td> <td style="padding: 5px;"> <?php echo $row["bookname"] ?></td>

</tr>
<?php 
} ?>
</table>

 

</div>
<blockquote>
<?php
include "includes/footer.php";
?>