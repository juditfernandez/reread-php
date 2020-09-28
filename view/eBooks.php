<!DOCTYPE html>
<html lang="en">
<head>
<title>ReRead</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!---Estilos Enlazados--->
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>

    <div class="logo">Re-read</div>      

<div class="header">
  <h1>Re-Read</h1>
  <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
</div>

<div class="row">

  <div class="column left">
    <div class="topnav">
        <a href="../index.php">Re-read</a>
        <a href="libros.php">Libros</a>
        <a href="eBooks.php">eBooks</a>
      </div>
      
    <h3>Toda la actualidad en eBook</h3>
    <!---eBooks con descripcion----->
    <?php
    //1.La conexion de la base de datos
    include '../Service/connection.php';

    //2.Selecion y muestra de datos de la base de datos
    $result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM Books");
    $i=0;
    if (!empty($result) && mysqli_num_rows($result) > 0) {
      $i++;
     while ($row = mysqli_fetch_array($result)) {
      echo "<div class= 'ebook'>";

      echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>";

      echo "<div class= 'desc'>".$row['Description']."</div>";
      echo "</div>";
      if ($i%3==0) {
        echo "<div style='clear:both;'></div>";
      }
    }
  }else{
    echo " 0 resultados";
  }
  ?>
  
  <div class="ebook">
      <a href="https://www.wattpad.com/story/148876302-los-cuervos-rojos"><img src="../img/ebook_1.jpg" alt="ebook 1">
      <div>Los Cuervos Rojos</div></a>
  </div>
    <div class="ebook">
      <a href="https://play.google.com/store/books/details/Stephen_King_La_sangre_manda?id=l2XlDwAAQBAJ&hl=es"><img src="../img/ebook_3.jpg" alt="ebook 3">
      <div>La Sangre Manda</div></a>
    </div>
  
    <div class="ebook">
     <a href="https://play.google.com/store/books/details/Javier_Sierra_El_mensaje_de_Pandora?id=bgrkDwAAQBAJ&hl=es"><img src="../img/ebook_4.jpg" alt="ebook 4">
      <div>El Mensaje De Pandora</div></a>
    </div>

    <div class="ebook">
      <a href="https://play.google.com/store/books/details/Javier_Mart%C3%ADnez_Lejos_de_aqu%C3%AD?id=dq_xDwAAQBAJ&hl=es"><img src="../img/ebook_5.jpg" alt="ebook 5">
      <div>Lejos De Aquí</div></a>
    </div>
  </div>
  

  <?php
    $result = mysqli_query($conn, "SELECT Books.Title FROM Books WHERE Top = 1");
  if (!empty($result) && mysqli_num_rows($result) > 0) {
      echo "<h2>Top Ventas</h2>";
      while ($row = mysqli_fetch_array($result)) {
       echo "<div class= 'column right'>";
       echo "<p>" .$row['Title']."</p>";
       echo "</div>";
     }
   }else{
    echo " 0 resultados";
  }
  ?>
</div>

</body>
</html>
