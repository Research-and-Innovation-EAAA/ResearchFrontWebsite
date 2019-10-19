<?php
require 'src/i18next.php';

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
    <svg class="svgTopRight" viewBox="-10 -10 185.4 79.89" xmlns="http://www.w3.org/2000/svg"><title>eaaa-logo</title><circle class="logo-circle" cx="105.5" cy="55.7" r="4.19"></circle><circle class="logo-circle" cx="123.07" cy="39.91" r="9.4"></circle><circle class="logo-circle" cx="149.98" cy="15.42" r="15.42"></circle><path class="logo-text" d="M69 11.85l-2.8 8.33h1.13l.74-2.29h3.23l.79 2.29h1.21l-2.9-8.33zm.7 1zm-1.3 4L69.7 13l1.3 3.88zM88.45 17.89l.8 2.29h1.21l-2.9-8.33h-1.42l-2.8 8.33h1.13l.74-2.29zm-1.61-5zm0 .15l1.31 3.87h-2.61zM107.28 19.18H103v-2.84h3.38v-1.02H103v-2.39h4.28v-1.01h-5.44v8.26h5.44v-1zM121.56 11.92h1.16v8.26h-1.16zM114.78 18.64l2.04-5.4.09.92.58 6.02h1.09l-.81-8.26h-1.59l-1.9 5.15-1.91-5.15h-1.58l-.82 8.26h1.09l.58-6.02.09-.92 2.04 5.4h1.01zM98 19.57a2.77 2.77 0 0 0 .69-2.09v-2.92a2.68 2.68 0 0 0-.68-2 2.67 2.67 0 0 0-1.92-.62h-3.44v8.26h3.44a2.68 2.68 0 0 0 1.91-.63zm-4.21-.38v-6.27H96c1.1 0 1.52.49 1.54 1.75v2.78c0 1.28-.37 1.72-1.53 1.74zM22.32 15.33h-4.07v-3.41h-1.16v8.26h1.16v-3.84h4.07v3.84h1.16v-8.26h-1.16v3.41zM29.04 18.68l-.03.14-.03-.13-2.16-6.77H25.6l2.77 8.26h1.18l2.84-8.26h-1.1l-2.25 6.76zM53.92 18.68l-.03.14-.03-.13-2.16-6.77h-1.22l2.77 8.26h1.18l2.85-8.26h-1.11l-2.25 6.76zM62.73 15.73l-1.85-.54c-.56-.17-.93-.25-.92-.71v-.68a.83.83 0 0 1 .89-.87h3.39v-.64c0-.31-.32-.37-.72-.37h-2.6a2 2 0 0 0-1.58.61 1.84 1.84 0 0 0-.5 1.27v.81c0 1 .59 1.36 1.75 1.65l1.92.56c.57.17.85.29.85.76v.35a1.12 1.12 0 0 1-1.14 1.25h-3.39v.64c0 .27.23.37.48.37h2.9a2.3 2.3 0 0 0 1.62-.51 2.25 2.25 0 0 0 .65-1.68v-.55c.01-1.1-.7-1.45-1.75-1.72zM34.51 20.18h5.44v-1h-4.28v-2.84h3.38v-1.02h-3.38v-2.39h4.28v-1.01h-5.44v8.26zM46.65 16.88a1.69 1.69 0 0 0 1.84-1.8v-1.32a1.77 1.77 0 0 0-.5-1.39 2.24 2.24 0 0 0-1.55-.45h-3.77v8.26h1.16v-3.3h1.39l2.24 3.3h1.38l-2.29-3.3zm-2.82-1v-3h2.28c1 0 1.21.13 1.23.91v1.11c0 .83-.18 1-1.12 1zM0 20.18h5.44v-1H1.16v-2.84h3.38v-1.02H1.16v-2.39h4.28v-1.01H0v8.26zM12.14 16.88a1.69 1.69 0 0 0 1.86-1.8v-1.32a1.77 1.77 0 0 0-.5-1.39 2.24 2.24 0 0 0-1.55-.45H8.16v8.26h1.16v-3.3h1.39l2.24 3.3h1.38L12 16.88zm-2.82-1v-3h2.28c1 0 1.21.13 1.23.91v1.11c0 .83-.18 1-1.12 1zM80.53 20.18h1.28l-2.95-4.33 2.86-3.93h-1.38l-2.56 3.51h-.98v-3.51h-1.17v8.26h1.17v-3.73h1.05l2.68 3.73zM67.93 33.83l.79 2.29h1.21L67 27.79h-1.38l-2.8 8.33H64l.74-2.29zm-1.61-5zm0 .15l1.31 3.87H65zM59.44 33.83l.8 2.29h1.21l-2.9-8.33h-1.42l-2.8 8.33h1.13l.74-2.29zm-1.61-5zm0 .15l1.31 3.87h-2.61zM103.87 31.66l-1.87-.54c-.56-.17-.93-.25-.92-.71v-.67a.83.83 0 0 1 .89-.87h3.39v-.64c0-.31-.32-.37-.72-.37h-2.6a2 2 0 0 0-1.58.61 1.84 1.84 0 0 0-.5 1.27v.81c0 1 .59 1.36 1.75 1.65l1.92.55c.57.17.85.29.85.76v.35a1.12 1.12 0 0 1-1.15 1.26H100v.64c0 .27.23.37.48.37h2.9a2.3 2.3 0 0 0 1.62-.51 2.25 2.25 0 0 0 .64-1.71v-.55c-.01-1.07-.73-1.36-1.77-1.7zM95.84 33.75c0 .91-.41 1.47-1.29 1.48h-1.34c-.89 0-1.28-.57-1.29-1.48v-5.89h-1.17v5.93a2.45 2.45 0 0 0 .69 1.88 2.58 2.58 0 0 0 1.8.59h1.24a2.51 2.51 0 0 0 1.82-.62 2.54 2.54 0 0 0 .66-1.9v-5.88h-1.12zM86.29 31.27h-4.07v-3.41h-1.16v8.27h1.16v-3.85h4.07v3.85h1.16v-8.27h-1.16v3.41zM76.11 32.82A1.69 1.69 0 0 0 78 31v-1.3a1.76 1.76 0 0 0-.5-1.39 2.24 2.24 0 0 0-1.54-.45h-3.83v8.26h1.16v-3.3h1.39l2.24 3.3h1.38l-2.3-3.3zm-2.82-1v-3h2.28c1 0 1.21.12 1.23.91v1.05c0 .84-.19 1-1.12 1z"></path></svg>
</div>

<div id="countContainer" style="padding-left:15px">

<iframe
  width="600"
  height="100"
  seamless
  frameBorder="0"
  scrolling="no"
  src="https://superset-public.forskning.eaaa.dk/superset/explore/?form_data=%7B%22datasource%22%3A%2213__table%22%2C%22viz_type%22%3A%22big_number_total%22%2C%22slice_id%22%3A78%2C%22cache_timeout%22%3A360%2C%22url_params%22%3A%7B%7D%2C%22granularity_sqla%22%3A%22timeStamp%22%2C%22time_grain_sqla%22%3Anull%2C%22time_range%22%3A%22No+filter%22%2C%22metric%22%3A%22count%22%2C%22adhoc_filters%22%3A%5B%5D%2C%22subheader%22%3A%22<?php
  echo ' ' . t('element.Job-ads');?>%22%2C%22y_axis_format%22%3A%22%2C.0f%22%2C%22header_font_size%22%3A0.5%2C%22subheader_font_size%22%3A0.4%7D&standalone=true&height=100"
>
</iframe>

</div>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php
                echo ' ' . t('element.headline');?></h1>

            <p class="lead text-muted"><?php
                echo ' ' . t('element.description');?></p>
            <p>
                <a href="https://www.eaaa.dk/kontakt/find-medarbejder/morten-mathiasen" class="btn btn-primary my-2"><?php
                    echo ' ' . t('element.contact-btn');?></a>
            </p>
        </div>

    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
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

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a class="logo" id="color2"  href="https://phpmyadmin.forskning.eaaa.dk">
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
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <p class="float-center">
    </p>
    <p>&copy; <?php
        echo ' ' . t('element.Footer');?></p>
</footer>


</body>
</html>

