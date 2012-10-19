<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="assets/css/docs.css" rel="stylesheet">
        <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

        <title>Affiliate Window ProductList</title>
        <style>
          
        </style>
    </head>

    <body>
        <div id="container" class="container-fluid">
            <div class="row-fluid">
                <section id="thumbnails">                

                    <?php
                    if (file_exists('AffiliateWindow_ProductList.xml')) {
                        $xml = simplexml_load_file('AffiliateWindow_ProductList.xml');

                        $products = $xml->product;
                    } else {
                        exit('Failed to open sample.xml');
                    }
                    $p = isset($_GET['p']) ? $_GET['p'] : 1; // default to page 1
                    $limit = 100; // show 10 results per page
                    $from = ($limit * $p) - $limit; // first item in array to show
                    $to = $from + $limit; // last item in array to show
                    $pages_to_display = (count($products) / $limit) + 1;
                    $baseUrl = $_SERVER['REQUEST_URL'];
                    ?>
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <?php
                            for ($number = 1; $number < $pages_to_display; $number++) {
                                echo "<li><a href='$baseUrl?p=$number'>$number</a></li>";
                            }
                            ?>                           
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                    <ul class="thumbnails">
                        <?php for ($i = $from; $i < $to; $i++) : ?>
                            <li class="span3 box">
                                <div class="thumbnail">
                                    <img src="<?php echo $products[$i]->imgurl ?>" alt="">
                                    <div class="caption">
                                        <h3><?php echo $products[$i]->name ?></h3>
                                        <p><?php echo $products[$i]->promotext ?></p>
                                        <span class="label label-info"><?php echo $products[$i]->category ?></span>                                            
                                    </div>
                                </div>                       
                            </li>
                         <?php endfor; ?>                    
                    </ul>

                </section>
            </div>
        </div>
       
    </body>
</html>

