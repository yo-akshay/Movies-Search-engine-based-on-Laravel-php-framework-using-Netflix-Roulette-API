<!DOCTYPE html>
<html>
<head>
<style>
    h1 {color: red;} 
	body {background-color:gray;}
  </style>
</head>
<body >
<h1 align="middle">Search engine</h1>
<form align="middle" >
  <h4 align="middle">Search a movie by it's Title</h4>
  <input type="text"  placeholder="Title" style="text-align: center" name="Title" value="">
  <br>
  <h4 align="middle">Search a movies by it's Director's name</h4>
  <input type="text" placeholder="Director" style="text-align: center" name="director" value="">
  <br>
  <h4 align="middle">Search a movies by Actor's name</h4>
  <input type="text" placeholder="Actor" style="text-align: center" name="Actor" value="">
  <br><br>
  <input type="submit" value="Submit" ">
</form> 

</body>
</html>

<?php use App\Http\Controllers\search_engine; search_engine::update(); ?>