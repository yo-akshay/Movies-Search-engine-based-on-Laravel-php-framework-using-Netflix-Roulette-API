<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class search_engine extends Controller
{
    //
	public static function update()
    {
		$Title = Input::get('Title');
		$director = Input::get('director');
		$Actor = Input::get('Actor');
				if(empty($Title) && empty($director) && empty($Actor) )
				{
					echo "<p>All fields are empty <p>";
				}
				else
				{
					if(!empty($Title))
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "http://netflixroulette.net/api/api.php?title=".$Title); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						$output = curl_exec($ch);   

						// convert response
						$output = json_decode($output);
						
						echo "<br><br>";
						foreach($output as $key =>$row)
						{
							if($key == "mediatype" || $key == "runtime" || $key == "unit" || $key == "show_id" )
									continue;
							else if($key == "show_cast" )
							{
								$pieces = explode(",", $row);
								echo"<br>Show Cast:";
								foreach($pieces as $strings)
								{
									$link='http://localhost:8000/?Title=&director=&Actor='.$strings;
									echo "<li><a href='$link'>$strings</a>";
								}
								echo "<br>";
							}
							else if($key == "director" )
								{
									if(empty($row))
										echo"<br>Director:No details of director<br>";
									else
									{
										echo"<br>Director:";
										$link='http://localhost:8000/?Title=&director='.$row.'&Actor=';
										echo "<a href='$link'>$row</a><br>";
									}
								}
								else if($key !="poster")
								{
									echo "<p>$key  :  $row";
										echo '<br>';
								}
								else
								{
									echo '<img src="'.$row.'" />';
								}
						}
						echo "<br><br><br><br><br><br>";
						curl_close($ch);
					}
					else if(!empty($director))
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "http://netflixroulette.net/api/api.php?director=".$director); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						$output = curl_exec($ch);   

						// convert response
						$output = json_decode($output);
						foreach($output as $value)
						{
							
							foreach($value as $key =>$row)
							{
								if($key == "mediatype" || $key == "runtime" || $key == "unit" || $key == "show_id" )
									continue;
								else if($key == "show_cast" )
								{
									echo"<br>Show Cast:";
									$pieces = explode(",", $row);
									foreach($pieces as $strings)
									{
										$link='http://localhost:8000/?Title=&director=&Actor='.$strings;
										echo "<li><a href='$link'>$strings</a>";
									}
									echo "<br>";
								}
								else if($key == "director" )
									{
										if(empty($row))
										echo"<br>Director:No details of director<br>";
										else
										{
											echo"<br>Director:";
											$link='http://localhost:8000/?Title=&director='.$row.'&Actor=';
											echo "<a href='$link'>$row</a><br>";
										}
									}
									else if($key !="poster")
									{
										echo "$key  :  $row";
											echo '<br>';
									}
									else
									{
										echo '<img src="'.$row.'" />';
									}
							}
							echo "<br><br><br><br><br><br>";
						}
						curl_close($ch);
					}
					else if(!empty($Actor))
					{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "http://netflixroulette.net/api/api.php?actor=".$Actor); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						$output = curl_exec($ch);   

						// convert response
						$output = json_decode($output);
						echo "<br><br>";
						foreach($output as $value)
						{
							
							foreach($value as $key =>$row)
							{
								if($key == "mediatype" || $key == "runtime" || $key == "unit" || $key == "show_id" )
									continue;
								else if($key == "show_cast" )
								{
									echo"<br>Show Cast:";
									$pieces = explode(",", $row);
									foreach($pieces as $strings)
									{
										$link='http://localhost:8000/?Title=&director=&Actor='.$strings;
										echo "<li><a href='$link'>$strings</a>";
									}
									echo "<br>";
								}
								else if($key == "director" )
									{
										if(empty($row))
										echo"<br>Director:No details of director<br>";
										else
										{
											echo"<br>Director:";
											$link='http://localhost:8000/?Title=&director='.$row.'&Actor=';
											echo "<a href='$link'>$row</a><br>";
										}
									}
									else if($key !="poster")
									{
										echo "$key  :  $row";
											echo '<br>';
									}
									else
									{
										echo '<img src="'.$row.'" />';
									}
							}
							
							echo "<br><br><br><br><br><br>";
						}
						curl_close($ch);
					}
				}
	}
	
}