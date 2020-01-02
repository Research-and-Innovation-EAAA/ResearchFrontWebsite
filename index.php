<?php
require 'src/i18next.php';
require 'src/credentials.php';

use Aiken\i18next\i18next;

function get_client_language($availableLanguages, $default='en'){
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $langs=explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);

        foreach ($langs as $value){
            $choice=substr($value,0,2);
            if(in_array($choice, $availableLanguages)){
                return $choice;
            }
        }
    }
    return $default;
}

try {
    i18next::init(get_client_language(array('da','en')));
}
catch (Exception $e) {

    echo 'Caught exception: ' . $e->getMessage();

}

function t($key, $variables = array()) {
//Get translation by key
    return i18next::getTranslation($key, $variables);

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://www.eaaa.dk/favicon.ico">

    <title><?php echo ' ' . t('element.title');?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script> <!--load all styles -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/holder.min.js"></script>
</head>
<body>

<div id="svgContainer">
    <?php echo " ".t('element.logo'); ?>
</div>
<div id="countContainer" style="padding-left:20px">

    <div style="height: 100px;">
        <div style="display: table-cell;
        height: 100px;
        padding: 5px;
        vertical-align: middle;">
            <?php
            $link = mysqli_connect(
                    $GLOBALS["database_host"],
                    $GLOBALS["database_user"],
                    $GLOBALS["database_password"],
                    $GLOBALS["database_db"],
                    $GLOBALS["database_port"]);

            if (!$link) {
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
            $result = mysqli_query($link, "select count(*) as adcount from annonce");
            $row = mysqli_fetch_assoc($result);
            echo "<H1 class=\"jumbotron-heading\">".number_format ( $row['adcount'], 0, t('element.decimalseperator'), t('element.thousandsseperator') ).
                "</H1><p class=\"lead text-muted\">".t('element.Job-ads')."</p>";
            mysqli_close($link);
            ?>
        </div>
    </div>

    </div>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php
                echo ' ' . t('element.headline');?></h1>
            <p class="lead text-muted"><?php
                echo ' ' . t('element.description');?></p>

        </div>

    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <!---card1-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo" id="color1" href="<?php echo ' ' . t('element.URL');?>">
                            <h2><?php echo ' ' . t('element.card1-h2');?></h2>
                            <i class="fas fa-chart-line fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card1-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="<?php echo 'location.href=\''.t('element.URL').'\'';?>">
                                        <?php echo ' ' . t('element.button');?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---card4-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo" id="color4"  href="https://superset.forskning.eaaa.dk">
                            <h2><?php
                                echo ' ' . t('element.card4-h2');?></h2>
                            <i class="fas fa-infinity fa-5x"></i>
                        </a>
                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card4-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://superset.forskning.eaaa.dk';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---card5-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo"  id="color5" href="https://wiki.forskning.eaaa.dk">
                            <h2><?php
                                echo ' ' . t('element.card5-h2');?></h2>
                            <i class="fas fa-info fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card5-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://wiki.forskning.eaaa.dk';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---card2-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo"  id="color2" href="https://phpmyadmin.forskning.eaaa.dk">
                            <h2><?php
                                echo ' ' . t('element.card2-h2');?></h2>
                            <i class="fas fa-database fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card2-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://phpmyadmin.forskning.eaaa.dk';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---card3-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo"  id="color3" href="https://rstudio.forskning.eaaa.dk">
                            <h2><?php
                                echo ' ' . t('element.card3-h2');?></h2>
                            <i class="fas fa-laptop-code fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card3-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://rstudio.forskning.eaaa.dk';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----card6-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo"  id="color6" href="https://www.eaaa.dk/kontakt/find-medarbejder/morten-mathiasen">
                            <h2><?php
                                echo ' ' . t('element.card6-h2');?></h2>
                            <i class="fas fa-user fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card6-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://www.eaaa.dk/kontakt/find-medarbejder/morten-mathiasen';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----card7-->
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo"  id="color7" href="https://forskning.eaaa.dk/CompetenceJSONEditor/">
                            <h2><?php
                                echo ' ' . t('element.card7-h2');?></h2>
                            <i class="fas fa-tools fa-5x"></i>
                        </a>

                        <div class="card-body">
                            <p class="card-text"><?php
                                echo ' ' . t('element.card7-text');?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://forskning.eaaa.dk/CompetenceJSONEditor/';"><?php
                                        echo ' ' . t('element.button');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <p class="float-center">
    </p>
    <p><?php echo "Copyright &copy; ".date("Y")."<br/>".t('element.Footer'); ?></p>
</footer>


</body>
</html>

