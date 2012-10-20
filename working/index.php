<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
      
        <title>Affiliate Window ProductList</title>   
    </head>

    <body>
        <div id="container" class="container-fluid">
            <div class="row-fluid">
                <section id="thumbnails">                

                    <?php
                    $xmlFileToRead = "AffiliateWindow_ProductList.xml";
                    
                    if (file_exists($xmlFileToRead)) {
                        $xml = simplexml_load_file($xmlFileToRead);

                        $products = $xml->product;
                    } else {
                        exit('Failed to open '.$xmlFileToRead);
                    }
                    $p = isset($_GET['p']) ? $_GET['p'] : 1; // default to page 1
                    $limit = 100; // show 10 results per page
                    $from = ($limit * $p) - $limit; // first item in array to show
                    $to = $from + $limit; // last item in array to show
                    $pages_to_display = (count($products) / $limit) + 1;
                    $baseUrl = $_SERVER['REQUEST_URL'];
                    ?>
                    <div class="pagination pagination-centered">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <?php
                            for ($number = 1; $number < $pages_to_display; $number++) {
                                $class = $p == $number ? "class='active'" : "";
                                echo "<li $class><a href='$baseUrl?p=$number'>$number</a></li>";
                            }
                            ?>                           
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                    <ul class="thumbnails">

                        <?php $count = 0;
                        for ($i = $from; $i < $to; $i++) : ?>

                         <?php if ($count == 0) echo '<li>'; ?>

                            <div class="span3 thumbnail">
                                <a href="<?php echo $products[$i]->purl ?>"><img src="<?php echo $products[$i]->imgurl ?>" alt=""></a>
                                <div class="caption">
                                    <h3><a target="_blank" href="<?php echo $products[$i]->purl ?>"><?php echo $products[$i]->name ?></a></h3>
                                    <p><?php echo $products[$i]->promotext ?></p>
                                    <p><strong>Del time:</strong> <?php echo $products[$i]->deltime ?></p>
                                    <p><strong>Del cost:</strong> <?php echo $products[$i]->delcost ?></p>
                                    <p><strong>Price:</strong> £<?php echo (string)$products[$i]->price->actualp ?></p>
                                    <span class="label label-info"><?php echo $products[$i]->category ?></span>
                                    <?php if(trim($products[$i]->cg) !== "") :?>
                                    <span class="label label-info"><?php echo $products[$i]->cg ?></span>                                            
                                    <?php endif; ?>
                                </div>
                            </div>                       

                            <?php
                            if ($count == 3) {
                                echo "</li>";
                                $count = 0;
                            } else {
                                $count++;
                            }
                            ?>
                        <?php endfor; ?>                    
                    </ul>
                    <div class="pagination pagination-centered">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <?php
                            for ($number = 1; $number < $pages_to_display; $number++) {
                                $class = $p == $number ? "class='active'" : "";
                                echo "<li $class><a href='$baseUrl?p=$number'>$number</a></li>";
                            }
                            ?>                           
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>            
    </body>
</html>

