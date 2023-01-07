
<?php
include "includes/header.php";
$sql = "SELECT * FROM books,authors where authors.id = books.authorid";
$result = $conn->query($sql);
	//echo $result;
?>
<blockquote>
<?php
// echo '';
// 	echo "<table id='myTable' style='width:80%; float:left'>";
// 	echo "<tr>";
//     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
// 	    echo "<td>";
// 	    echo "<table>";
// 	   	echo '<tr><td style="padding: 5px;">Title: '.$row["bookname"].'</td></tr><tr><td style="padding: 5px;">Author: '.$row["AuthorName"].'</td></tr><tr><td style="padding: 5px;">
// 	    </td></tr>';
// 	   	echo "</table>";
// 	   	echo "</td>";
//     }
//     echo "</tr>";
//     echo "</table>";
// 	echo '';
	?>

<div class="slideshow-container">
<?php
 while($row = $result->fetch(PDO::FETCH_ASSOC)) {
?>
<div class="mySlides">
  <q><?php echo $row["bookname"] ?></q>
  <p class="author">- <?php echo $row["AuthorName"] ?></p>
</div>
<!-- <div class="mySlides">
  <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
  <p class="author">- John Keats</p>
</div>

<div class="mySlides">
  <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
  <p class="author">- Ernest Hemingway</p>
</div>

<div class="mySlides">
  <q>I have not failed. I've just found 10,000 ways that won't work.</q>
  <p class="author">- Thomas A. Edison</p>
</div> -->
<?php
 }
 ?>
<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<div class="dot-container">
<?php
$sql1 = "SELECT * FROM books,authors where authors.id = books.authorid";
$result1 = $conn->query($sql1);
 $i = 0;
 while($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
	 $i++;
?>
  <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span> 
  <?php
  }
  ?>
</div>
</blockquote>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
window.onload= function () {
 setInterval(function(){ 
     plusSlides(1);
 }, 3000);
 }


</script>