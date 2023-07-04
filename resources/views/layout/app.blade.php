<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image">

    <!-- Webpage Title -->
    <title>Warranty Tracker</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top" style="color: #a53f72" id="body">
    <a href="#" class="back-to-top">Back to Top</a>

@yield('content')


    <!-- Scripts -->
    <script src="gemdev/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="gemdev/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="gemdev/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="gemdev/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="gemdev/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="gemdev/js/scripts.js"></script> <!-- Custom scripts -->
    <script>
        $(document).ready(function() {
            // Tombol "Back to Top" diklik
            $('.back-to-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });
        });
        </script>
</body>
</html>
