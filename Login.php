<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html", charset="utf-8" />
  	<title>Twitter API SEARCH</title>
</head>
<body>
	<form action="?go=search" method="post">
		<label for="keyword">
			<input type="text" name="keyword" >
		</label>
		<label>
			<input type="submit" name="search"value="Search">
		</label>
	</form>

</body>
</html>

<?php

	include "twitteroauth/twitteroauth.php";

	$consumer_key = "CGQ1Er3rmkklEokk343pnyxkd";
	$consumer_secret = "G6tUw8fdhsG3Ge8d5oaTaEz2meqCyrZkYc9vlKKdY9wUAHgVkT";
	$access_token = "2386163342-D2CwrTGH5Dmmyjy4DluDEI733zh3Wo7StOItFM2";
	$access_token_secret = "jC176ARhtgPItxmq8r5BhfG5eAHUW4GHr8Rx9rnqrUEZu";

	$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

?>

<?php

    if (@$_GET ['go'] == "search"){
        
       	$keyword = $_POST['keyword'];

        if(empty($keyword)){
           echo "<script>alert('Preencha Todos os Campos Para Pesquisar!')</script>";

        }else{
        
	 		if(isset($_POST['keyword'])){
	 				
	 			$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&result_type=recent&count=50');
				foreach ($tweets->statuses as $key => $tweet) { ?>
				    Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?><br>
				<?php } } } } else{
					} ?>
