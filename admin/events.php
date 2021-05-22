<!DOCTYPE html>
<html lang="en">

<?php

/**
 * Events Gallery Page
 * 
 * @Author - Yogesh Choudhary - choudharyyogsa17ite@student.mes.ac.in
 * 
*/

//database config connection file in the same directory for $link connection variable
// Attempt MySQL server connection.
require "db_config.php";

$sql = 'SELECT * FROM csipce_events ORDER BY event_datetime DESC';  //selecting events in descending order of date

$result = $link->query($sql);

//Initialise Array Variables for all the data items
$event_datetime = array();
$event_name = array();
$event_description = array();
$event_cover = array();
$event_images = array();
$event_image_count = array();

$i = 0; //Iterable variable

//Storing the results in Arrays which will be passed to javascript
while($row = $result->fetch_assoc()) {
      
    $event_datetime[$i] = $row['event_datetime'] ;
    $event_name[$i] = $row['event_name'] ;
    $event_description[$i] = $row['event_description'] ;
    $event_cover[$i] = $row['event_cover'] ;
    $event_images[$i] = $row['event_images'] ;

    $i++ ; //increment
}
   
$link->close();  //Closing connection to database


//Config File containing path to event images
require "site_config.php";

//going back and appending events path address from config file
$server_address = "..".$events_images_directory;

?>


<head>
    <meta charset="UTF-8">

    <!-- 
    @author - Yogesh Choudhary - Contact: choudharyyogsa17ite@student.mes.ac.in
   -->

    <title>CSIPCE - Events Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>

    <!-- Stylesheet -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:wght@300&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');



        /* Hide Scrollbar in chromium based browsers (firefox not supported)*/
        ::-webkit-scrollbar {
            display: none;
        }


        body,
        html {
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            position: relative;
            width: 100%;
            height: 100%;
            /* White Page Background */
            background: #ffffff;
            font-size: 20px;
            font-family: 'Roboto Condensed', sans-serif;
            /* Removes scrollbar from firefox */
            scrollbar-width: none;

        }

        @supports (display: grid) {

            body,
            html {
                display: block;
            }
        }

        .message {
            border: 1px solid #d2d0d0;
            padding: 2em;
            font-size: 1.7vw;
            box-shadow: -2px 2px 10px 0px rgba(68, 68, 68, 0.4);
        }

        @supports (display: grid) {
            .message {
                display: none;
            }
        }

        .section {
            display: none;
            padding: 2rem;
        }

        @media screen and (min-width: 768px) {
            .section {
                padding: 4rem;
            }

        }



        @supports (display: grid) {
            .section {
                display: block;
            }
        }

        h1 {
            font-size: 2rem;
            margin: 0 0 1.5em;
        }

        .grid {
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-auto-rows: 150px;
            grid-auto-flow: row dense;
        }

        .content-details {
            position: absolute;
            text-align: center;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 1;
            transform: translate(-50%, -50%);
            transition: 0.3s;

        }

        .content-details h3 {
            color: #213159   ;
            text-shadow: none;
            background: rgba(255, 255, 255);
            opacity: 1;
            font-size: 2em;
            font-weight: 500;
            letter-spacing: 0em;
            margin-bottom: 0.5em;
            padding: 0.4em 0.3em 0.3em 0.3em;
            transition: 0.1s all;
            line-height: 0.9em;
        }

        .item {
            /* Optional Border Below */
            /* border: 2px solid white; */
            position: relative;
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -webkit-box-pack: end;
            justify-content: flex-end;
            box-sizing: border-box;
            background: #0c9a9a;
            color: #fff;
            grid-column-start: auto;
            grid-row-start: auto;
            color: #fff;
            background: transparent;
            background-size: cover;
            background-position: center;
            box-shadow: -2px 2px 10px 0px rgba(68, 68, 68, 0.4);
            -webkit-transition: -webkit-transform 0.3s ease-in-out;
            transition: -webkit-transform 0.3s ease-in-out;
            transition: transform 0.3s ease-in-out;
            transition: transform 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
            cursor: pointer;
            text-align: center;
        }

        .item:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: black;
            /* Intial Opacity */
            opacity: 0.1;
            -webkit-transition: opacity 0.3s ease-in-out;
            transition: opacity 0.3s ease-in-out;
        }

        .item:hover {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .item:hover>.content-details h3 {
            color: black;
            background: rgba(255, 255, 255, 0.9);
            opacity: 1;
        }

        .item:hover:after {
            /* After Hover Opacity */
            opacity: 0;
        }

        .item--medium {
            grid-row-end: span 2;
        }

        .item--large {
            grid-row-end: span 3;
        }

        .item--full {
            grid-column-end: auto;
        }

        @media screen and (min-width: 768px) {
            .item--full {
                grid-column: 1/-1;
                grid-row-end: span 2;
            }
        }

        .port {
            position: fixed;
            visibility: hidden;
            overflow-y: scroll;
            top: 0;
            left: 0;
            width: 100%;
            height: 0%;
            transition: 0.5s all;
            background: white;
            z-index: 2;
        }

        .port.item_open {
            height: 100%;
            visibility: visible;
        }


        /* Page Loading Animation from Load-Awesome Begins Here */

        /*!
        * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
        * Copyright 2015 Daniel Cardoso <@DanielCardoso>
        * Licensed under MIT
        */

        .la-ball-clip-rotate-pulse,
        .la-ball-clip-rotate-pulse>div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .la-ball-clip-rotate-pulse {
            display: block;
            font-size: 0;
            color: #fff;
        }

        .la-ball-clip-rotate-pulse.la-dark {
            color: #333;
        }

        .la-ball-clip-rotate-pulse>div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }

        .la-ball-clip-rotate-pulse {
            width: 32px;
            height: 32px;
        }

        .la-ball-clip-rotate-pulse>div {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 100%;
        }

        .la-ball-clip-rotate-pulse>div:first-child {
            position: absolute;
            width: 32px;
            height: 32px;
            background: transparent;
            border-style: solid;
            border-width: 2px;
            border-right-color: transparent;
            border-left-color: transparent;
            -webkit-animation: ball-clip-rotate-pulse-rotate 1s cubic-bezier(.09, .57, .49, .9) infinite;
            -moz-animation: ball-clip-rotate-pulse-rotate 1s cubic-bezier(.09, .57, .49, .9) infinite;
            -o-animation: ball-clip-rotate-pulse-rotate 1s cubic-bezier(.09, .57, .49, .9) infinite;
            animation: ball-clip-rotate-pulse-rotate 1s cubic-bezier(.09, .57, .49, .9) infinite;
        }

        .la-ball-clip-rotate-pulse>div:last-child {
            width: 16px;
            height: 16px;
            -webkit-animation: ball-clip-rotate-pulse-scale 1s cubic-bezier(.09, .57, .49, .9) infinite;
            -moz-animation: ball-clip-rotate-pulse-scale 1s cubic-bezier(.09, .57, .49, .9) infinite;
            -o-animation: ball-clip-rotate-pulse-scale 1s cubic-bezier(.09, .57, .49, .9) infinite;
            animation: ball-clip-rotate-pulse-scale 1s cubic-bezier(.09, .57, .49, .9) infinite;
        }

        .la-ball-clip-rotate-pulse.la-sm {
            width: 16px;
            height: 16px;
        }

        .la-ball-clip-rotate-pulse.la-sm>div:first-child {
            width: 16px;
            height: 16px;
            border-width: 1px;
        }

        .la-ball-clip-rotate-pulse.la-sm>div:last-child {
            width: 8px;
            height: 8px;
        }

        .la-ball-clip-rotate-pulse.la-2x {
            width: 64px;
            height: 64px;
        }

        .la-ball-clip-rotate-pulse.la-2x>div:first-child {
            width: 64px;
            height: 64px;
            border-width: 4px;
        }

        .la-ball-clip-rotate-pulse.la-2x>div:last-child {
            width: 32px;
            height: 32px;
        }

        .la-ball-clip-rotate-pulse.la-3x {
            width: 96px;
            height: 96px;
        }

        .la-ball-clip-rotate-pulse.la-3x>div:first-child {
            width: 96px;
            height: 96px;
            border-width: 6px;
        }

        .la-ball-clip-rotate-pulse.la-3x>div:last-child {
            width: 48px;
            height: 48px;
        }

        /*
        * Animations
        */
        @-webkit-keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -webkit-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-moz-keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -moz-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -moz-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -moz-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-o-keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -o-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -o-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -o-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                -moz-transform: translate(-50%, -50%) rotate(0deg);
                -o-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                -webkit-transform: translate(-50%, -50%) rotate(180deg);
                -moz-transform: translate(-50%, -50%) rotate(180deg);
                -o-transform: translate(-50%, -50%) rotate(180deg);
                transform: translate(-50%, -50%) rotate(180deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                -moz-transform: translate(-50%, -50%) rotate(360deg);
                -o-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-webkit-keyframes ball-clip-rotate-pulse-scale {

            0%,
            100% {
                opacity: 1;
                -webkit-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
            }

            30% {
                opacity: .3;
                -webkit-transform: translate(-50%, -50%) scale(.15);
                transform: translate(-50%, -50%) scale(.15);
            }
        }

        @-moz-keyframes ball-clip-rotate-pulse-scale {

            0%,
            100% {
                opacity: 1;
                -moz-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
            }

            30% {
                opacity: .3;
                -moz-transform: translate(-50%, -50%) scale(.15);
                transform: translate(-50%, -50%) scale(.15);
            }
        }

        @-o-keyframes ball-clip-rotate-pulse-scale {

            0%,
            100% {
                opacity: 1;
                -o-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
            }

            30% {
                opacity: .3;
                -o-transform: translate(-50%, -50%) scale(.15);
                transform: translate(-50%, -50%) scale(.15);
            }
        }

        @keyframes ball-clip-rotate-pulse-scale {

            0%,
            100% {
                opacity: 1;
                -webkit-transform: translate(-50%, -50%) scale(1);
                -moz-transform: translate(-50%, -50%) scale(1);
                -o-transform: translate(-50%, -50%) scale(1);
                transform: translate(-50%, -50%) scale(1);
            }

            30% {
                opacity: .3;
                -webkit-transform: translate(-50%, -50%) scale(.15);
                -moz-transform: translate(-50%, -50%) scale(.15);
                -o-transform: translate(-50%, -50%) scale(.15);
                transform: translate(-50%, -50%) scale(.15);
            }
        }

        /* Page Loading Animation Ends Here */



        /* Carousal Image Load SVG */
        .carousel-item img {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='135' height='140' viewBox='0 0 135 140' fill='%23fff'%3E%3Crect y='33.5672' width='15' height='72.8655' rx='6' style='fill: black;'%3E%3Canimate attributeName='height' begin='0.5s' dur='1s' values='120;110;100;90;80;70;60;50;40;140;120' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='y' begin='0.5s' dur='1s' values='10;15;20;25;30;35;40;45;50;0;10' calcMode='linear' repeatCount='indefinite'/%3E%3C/rect%3E%3Crect x='30' y='46.0672' width='15' height='47.8655' rx='6' style='fill: black;'%3E%3Canimate attributeName='height' begin='0.25s' dur='1s' values='120;110;100;90;80;70;60;50;40;140;120' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='y' begin='0.25s' dur='1s' values='10;15;20;25;30;35;40;45;50;0;10' calcMode='linear' repeatCount='indefinite'/%3E%3C/rect%3E%3Crect x='60' width='15' height='125.731' rx='6' y='7.1345' style='fill: black;'%3E%3Canimate attributeName='height' begin='0s' dur='1s' values='120;110;100;90;80;70;60;50;40;140;120' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='y' begin='0s' dur='1s' values='10;15;20;25;30;35;40;45;50;0;10' calcMode='linear' repeatCount='indefinite'/%3E%3C/rect%3E%3Crect x='90' y='46.0672' width='15' height='47.8655' rx='6' style='fill: black;'%3E%3Canimate attributeName='height' begin='0.25s' dur='1s' values='120;110;100;90;80;70;60;50;40;140;120' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='y' begin='0.25s' dur='1s' values='10;15;20;25;30;35;40;45;50;0;10' calcMode='linear' repeatCount='indefinite'/%3E%3C/rect%3E%3Crect x='120' y='33.5672' width='15' height='72.8655' rx='6' style='fill: black;'%3E%3Canimate attributeName='height' begin='0.5s' dur='1s' values='120;110;100;90;80;70;60;50;40;140;120' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='y' begin='0.5s' dur='1s' values='10;15;20;25;30;35;40;45;50;0;10' calcMode='linear' repeatCount='indefinite'/%3E%3C/rect%3E%3C/svg%3E") no-repeat fixed center;
        }
    </style>

</head>


<body>

    <!-- Loading Animation that appears while the page loads -->
    <div style="color: #f04b4c; position: fixed; top: 15%; left: 50%; z-index: 3; transform: translate(-50%,-50%);"
        class="overlay la-ball-clip-rotate-pulse la-3x">
        <div></div>
        <div></div>
    </div>

    <!-- Error Message When CSS Grid is not supported -->
    <div class="message">
        Sorry, your browser does not support CSS Grid. Try again with a chromium based web browser.
    </div>

    <!-- Event Gallery Begins Here-->
    <section class="section">
        <!-- <h1>Gallery</h1> -->
        <div class="grid" id="gallery-grid">
            <!-- Filled via below Javascript -->

            <!-- Example Grid Element -->
            <!--
            <div class="item item--medium" id=grid_id_number
                style="background-image: url('https://envault.ml/csipce/wp-content/uploads/events/Makers Day/cover.jpg');">
        
                <div class="content-details">
                    <h3 class="content-title">Event Name Here</h3>
                </div>
        
            </div>
        -->

        </div>
    </section>
    <!-- Gallery Ends Here -->


    <!-- Screen Overlay for loading animation -->
    <div class="port item_open">
        <!-- Initially set to open for the loading animation -->
    </div>
    <!-- Screen Overlay Ends Here -->



    <!-- Modal Container Begins -->

    <div class="container">

        <!-- Modal Begins -->
        <div class="modal fade" id="event_details_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div style="padding: 0.75rem 1rem 0.5rem 1rem;" class="modal-header">

                        <!-- Filled via Javascript Below -->
                        <!-- Example Heading -->
                        <!-- <h4 style="font-size: 1rem;" class="modal-title" id="event_title" >Modal Heading</h4> -->
                        <h4 style="font-size: 1rem;" class="modal-title" id="event_title" ></h4>
                        
                        <!-- Header Close Icon -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row" style="margin-bottom: 30px;">

                                <!-- Event Images Carousel -->
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                    <!-- Indicators -->
                                    <ol class="carousel-indicators" id="carousel_indicator">

                                        <!-- Filled via Javascript Below -->
                                        <!-- Example Indicator -->
                                        <!-- 
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> 
                                        -->
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" id="carousel_slides">

                                        <!-- Filled via Javascript Below -->

                                        <!-- Example Slides -->
                                        <!--
                                        <div class="carousel-item active">

                                            <img class="d-block w-100"
                                                src="https://images.unsplash.com/photo-1422255198496-21531f12a6e8?dpr=2&auto=format&fit=crop&w=1500&h=996&q=80&cs=tinysrgb&crop="
                                                alt="Slide0">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="https://images.unsplash.com/photo-1476097297040-79e9e1603142?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop="
                                                alt="Slide1">
                                        </div>
                                        -->
                                        
                                    </div>

                                    <div id="carousel_controls">
                                    <!-- Filled via Javascript Below -->
                                    <!-- Example Controls -->
                                    <!-- Left and right controls -->

                                    <!-- 
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    -->

                                    </div>

                                </div>
                            </div>
                            <div class="row"
                                style="font-family: Lato; line-height: 1.1em; font-size: 18px; color: #333;">

                                <p id="event_date">
                                    <!-- Filled via Javascript Below -->
                                    <!-- Example Date 2020-12-31 -->
                                </p>


                                <p id="event_description">
                                    <!-- Filled via Javascript Below -->
                                    <!-- Example Content -->
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Blank Footer -->
                    </div>

                </div>
            </div>
        </div>
        <!--Modal Ends Here-->

    </div>

    <!-- Modal Container Ends -->










    <!-- JavaScript Begins Here -->
    <script>
        /* Function to remove loading animation */
        function fadeaway() {
            $(".port").removeClass('item_open');
            document.querySelector(".overlay").style.display = "none";
        }

        /* Setting a Minimum and Maximum Timeout for the loading animation and the onLoad Event */
        var flag = false;
        document.body.onload = function () {
            if (flag) { fadeaway(); }
            else { var ctr = setInterval(function () { if (flag) { fadeaway(); clearInterval(ctr) } }, 500) }
        }
        setTimeout(function () { flag = true; }, 3000) //Minimum Timeout
        setTimeout(function () { fadeaway(); }, 7000)  //Maximum Timeout

        /* Retriving data from php */
        //Changing PHP arrays to javascript arrays
        var event_datetime = <?php echo json_encode($event_datetime); ?>;
        var event_name = <?php echo json_encode($event_name); ?>;
        var event_description = <?php echo json_encode($event_description); ?>;
        var event_cover = <?php echo json_encode($event_cover); ?>;
        var event_images = <?php echo json_encode($event_images); ?>;

        //Get the server address for setting image paths
        var server_address = <?php echo json_encode($server_address); ?>;

        /* Gallery Grid Formation */
        var grid_code = "";
        //Apending all the grid items
        for (let i = 0; i < event_name.length; i++) {
            grid_code +=
                `<div class="item item--medium" onmouseover="repl(this)" onmouseout="repl_out(this)" id="grid_item_${i}" style="background-image: url('${server_address}${event_cover[i]}');">
                <div class="content-details"><h3 class="content-title">${event_name[i]}</h3></div></div>`;
        }
        //Assigining the formed grid to the gallery in HTML DOM
        document.getElementById("gallery-grid").innerHTML = grid_code;

        /* Open and Populate Modal/Popup */
        //onClick function for grid items to open popup
        $('.item.item--medium').click(function () {

            //Retriving the Array id from the Grid id of the item
            var grid_item_id = $(this).attr("id");
            var gid = parseInt(grid_item_id.substring(10, 20)); //Array id of clicked Event

            //Generating an array of image paths of the clicked Event 
            var popup_event_images = event_images[gid].split(",");


            //Assigining the Title, Date, and Description of the clicked item to the popup HTML DOM
            document.getElementById("event_title").innerHTML = event_name[gid];
            document.getElementById("event_date").innerHTML = new Date(event_datetime[gid]).toDateString().split(" ").slice(1,4).join(" "); /* Creaing Proper Date Format for display */
            document.getElementById("event_description").innerHTML = event_description[gid];

            /* Generating Image Carousel for the Selected Event */
            //Binding the initial active element of the carousel
            //Bottom carousel indicators
            var carousel_indicator = `<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>`;

            //Carousel Images
            var carousel_image_slides =
                `<div class="carousel-item active"><img class="d-block w-100" src="${server_address}${event_cover[gid]}" alt="Slide0"></div>`;

            //Carousel Left-Right Controls
            var carousel_controls =
                `<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>`;

            //Appending all the Indicators and Images to the carousel from the image array 
            for (let i = 1; i <= popup_event_images.length; i++) {
                carousel_indicator +=
                    `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
                carousel_image_slides +=
                    `<div class="carousel-item"><img class="d-block w-100" src="${server_address}${popup_event_images[i - 1]}" alt="Slide${i}"></div>`;
            }

            //Assigining the Generated carousel elements to the Popup HTML DOM
            document.getElementById("carousel_indicator").innerHTML = carousel_indicator;
            document.getElementById("carousel_slides").innerHTML = carousel_image_slides;
            document.getElementById("carousel_controls").innerHTML = carousel_controls;

            //opening event details modal
            $('#event_details_modal').modal('show');

            return false;
        });

        //Temporary Variable
        var tmp;

        //Functions for mouse hover effects
        function repl(x) {
            var cnt = x.querySelector(".content-details h3");
            cnt.style.opacity = "0";
            tmp = cnt.innerHTML;
        }

        function repl_out(x) {
            var cnt = x.querySelector(".content-details h3");
            cnt.style.opacity = "1";
            cnt.style.fontSize = "2em";
            cnt.innerHTML = tmp;
        }

    </script>
    <!-- JavaScript Ends Here -->

</body>

</html>