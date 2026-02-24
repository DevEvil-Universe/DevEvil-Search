<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description"
		content="DevEvil Search is a fast, simple, open-source and private AI-powered search engine designed to provide lightning-quick results while ensuring user privacy.">
	<meta name="keywords"
		content="devevil search, dev evil search, search, search engine, private search engine, ai, private, fast search engine, google, devevil, dev evil, dev, evil, developer, freelance, devevil99, devevil021, devevil themes, devevil universe, universe, dev evil universe, web designer, website developer, web developer, website designer">
	<meta name="author" content="DevEvil Search">
	<meta name="robots" content="index, follow">
	<link rel="canonical" href="https://search.devevil.com">

	<title>DevEvil Search - AI-powered search engine</title>
	<link rel="icon" href="./img/logo.png" type="image/x-icon">

	<meta property="og:title" content="DevEvil Search">
	<meta property="og:description"
		content="DevEvil Search is a fast, simple, open-source and private AI-powered search engine designed to provide lightning-quick results while ensuring user privacy.">
	<meta property="og:image" content="https://search.devevil.com/img/logo.png">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="DevEvil Search">
	<meta name="theme-color" content="#5F22D9">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="DevEvil Search">
	<meta name="twitter:description"
		content="DevEvil Search is a fast, simple, open-source and private AI-powered search engine designed to provide lightning-quick results while ensuring user privacy.">
	<meta name="twitter:image" content="https://search.devevil.com/img/logo.png">

	<link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

	<link rel="manifest" href="./manifest.json?v=<?php echo time(); ?>">
</head>

<body>
	<script>
		if ('serviceWorker' in navigator) {
			window.addEventListener('load', function () {
				navigator.serviceWorker.register('./service.js?v=<?php echo time(); ?>').then(function (
					registration) {
					console.log('ServiceWorker registration successful with scope: ', registration.scope);
				}, function (err) {
					console.log('ServiceWorker registration failed: ', err);
				});
			});
		}
	</script>

	<div id="background"></div>

	<?php include './navbar.php'?>

	<div class="centered-content">
		<div class="search-container">
			<form action="./search" method="GET" autocomplete="off">
				<div class="logo-container">
					<img src="./img/logo2.png" draggable="false" alt="DevEvil Search Logo" class="logo">
					<p style="width: 100%; color: var(--third); margin-top: 10px;">
						DevEvil Search is a fast, simple, open-source and private AI-powered search engine designed to provide lightning-quick results while ensuring user privacy.
					</p>
				</div>
				<div class="input-container">
					<input type="text" class="search-input" name="q" placeholder="Search the web..." required>
					<input type="hidden" name="safe" id="safeInput" value="active">
					<input type="hidden" name="cr" id="locInput" value="countryUS">
					<button type="submit" class="search-button">
						<i title="Search" class="fa-solid fa-magnifying-glass"></i>
					</button>
				</div>
			</form>
		</div>
	</div>

	<div id="credit"></div>


	<script src="js/index.js?v=<?php echo time(); ?>"></script>
	<script src="js/safesearch.js?v=<?php echo time(); ?>"></script>
	<script src="js/background.js?v=<?php echo time(); ?>"></script>
</body>

</html>