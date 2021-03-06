<?php
session_start();

echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/forum">idiscuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="SELECT category_id,category_name FROM `categories`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){ 
        echo '<a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
        }
          
       echo '</div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<p class="text-light my-0 mx-2">welcome'.$_SESSION['useremail'].'</p>
      <a href="partials/_logout.php" class="btn btn-outline-success mx-2" >log out</a>';
  
    }
    else{
     echo '<div class="mx-2">
      <button class="btn btn-outline-success" data-toggle="modal" data-target="#loginmodal">login</button>
    </div>
    <div class="mx-2">
      <button class="btn btn-outline-success" data-toggle="modal" data-target="#signupmodal">sign up</button>
    </div>';}
    
    echo '<form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>';
  echo '</div>
</nav>';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true'){
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
   <strong>success!</strong> Now you can log in.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
 }
?>