<!DOCTYPE html>
<html lang="en">
<title>Car Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="/template/css/style.css">
<link rel="stylesheet" href="/template/css/custom.css">
<style>
    body, html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }

    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("/upload/images/ferrari_f_40.jpg");
        min-height: 90%;
    }

    .menu {
        display: none;
    }
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
    <div class="w3-row w3-padding w3-black">
        <div class="w3-col s3">
            <a href="/" class="w3-button w3-block w3-black">HOME</a>
        </div>
        <div class="w3-col s3">
            <a href="/news" class="w3-button w3-block w3-black">NEWS</a>
        </div>
        <div class="w3-col s3">
            <a href="/admin" class="w3-button w3-block w3-black">ADMIN</a>
        </div>
        <div class="w3-col s3">
            <a href="#menu" class="w3-button w3-block w3-black">CONTACT</a>
        </div>
    </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-middle w3-center">
        <span class="w3-text-green-op" style="font-size:60px">Car Blog</span>
    </div>
</header>
