<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/Article-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="../assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:rgb(251,251,252);">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Guia do SUS</a>
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
            <li role="presentation"><a href="#TRADUTOR">Tradutor</a></li>
            <li role="presentation"><a href="#CHEGANDO">Chegando no País</a></li>
            <li role="presentation"><a href="#ENTENDENDO">Entendendo o SUS</a></li>
            <li role="presentation"><a href="#ONDEIR">Onde ir</a></li>
            <li role="presentation"><a href="#DICIONARIO">Dicionário</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="container" style="margin-top:70px;">
    <div id="TRADUTOR">
      <h1>TRADUTOR </h1>
        <div class="form-group">
          <form action="index.php" method="post">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <label><span class="languageSecond"></span></label>
              <?php
              if(isset($_POST['texto'])){
                echo '<textarea class="form-control text-area-translate" name="texto" rows="6" aria-label="..." autofocus>'.$_POST['texto'].'</textarea>';
              }else echo '<textarea class="form-control text-area-translate" name="texto" rows="6" aria-label="..."  autofocus></textarea>';
              ?>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" style="margin-top:50px;">
              <button class="btn btn-primary" type="submit">
                <span class="glyphicon glyphicon-play"></span> &nbsp;<span class="firstBT"></span>
              </button>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <label><span class="languageFirst"></span></label>
              <?php
                if(isset($_POST['texto'])){
                  $text = $_POST['texto'];
                  $apiKey = 'AIzaSyDXMONXURGT-zqY96Yih08F14OhshvQpko';
                  $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=fr&target=pt-br';
                  $handle = curl_init($url);
                  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($handle);
                  $responseDecoded = json_decode($response, true);
                  curl_close($handle);
                  echo '<textarea class="form-control text-area-translate" readonly rows="6" aria-label="...">'.$responseDecoded['data']['translations'][0]['translatedText'].'</textarea>';
                }else echo '<textarea class="form-control text-area-translate" readonly rows="6" aria-label="..."></textarea>';
              ?>
            </div>
        </form>
      </div>
    </div>
    <div id="CHEGANDO" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="page-header">
          <h1>Chegando no País</h1>
      </div>
      <p>Para que seja realizado qualquer atendimento é necessario o cartao SUS.</p>
      <h1>Cartão SUS</h1><img class="img-responsive" src="../assets/img/SUS.png">
      <h1>Documentos Necessários</h1>
      <p>Para a emissão do Cartão SUS é nessário comparecer ao posto de saude mais proximo com os seguintes documentos</p>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><img src="../assets/img/rg.jpg" width="100%">
              <p>RG/CPF</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><img src="../assets/img/AutorizacaoImpressaPassaporte_ID1.jpg" width="100%">
              <p>PASSAPORTE </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><img src="../assets/img/noticia_37519.png" width="100%">
              <p>COMPROVANTE DE ENDEREÇO</p>
          </div>
      </div>
    </div>
    <div id="ENTENDENDO" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="page-header">
          <h1>Entendendo o SUS</h1>
      </div>
      <p>O Sistema Único de Saúde (SUS) é um dos maiores sistemas públicos de saúde do mundo. Ele abrange desde o simples atendimento ambulatorial até o transplante de órgãos, garantindo acesso integral, universal e gratuito para toda a população do país. </p>
    </div>
    <div id="ONDEIR" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-6">
          <div class="col-md-12">
                  <h1>Onde Ir (TOLEDO)</h1>
                  <div id="map" style="width:500px;height:500px;background:yellow"></div>
          </div>
      </div>
      <div class="col-md-6">
          <div id="QUEMPROCURAR" class="col-md-12">
                  <h1>Quem Procurar</h1>
              <ul>
                  <li>
                      Emergência
                      <ul>
                          <li> <a href="#QUEMPROCURAR" onclick="markerButtomUpas()">UPA </a> </li>
                          <li> <a href="#QUEMPROCURAR" onclick=""> MINI HOSPITAL</a></li>
                      </ul>
                  </li>
                  <li>
                      Consultas
                      <ul>
                          <li> <a href="#QUEMPROCURAR" onclick="markerButtomUbss()">UBS's</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
    </div>
    <div id="DICIONARIO" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Dicionário</h1>

      <h1>Sintomas </h1>
      <p>Paragraph</p>
      <h1>Corpo Humano</h1>
      <p>Paragraph</p>
      <h1>Medicações </h1>
      <p>Paragraph</p>
      <h1>Doenças </h1>
      <p>Paragraph</p>
    </div>
  </div>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <script src="../assets/js/Sidebar-Menu.js"></script>
</body>
<script>
    var flag = 0;
    var markerButtomUpas = function() {
        flag = 1;
        myMap();
    };

    var markerButtomUbss = function() {
        flag = 2;
        myMap();
    };

    function myMap() {
        var upaI = {lat: -24.7323587, lng: -53.769603};
        var ubs = {lat: -24.7195765, lng: -53.734847};
        var mapOptions = {
            center: new google.maps.LatLng(-24.73,-53.75),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        if(flag == 1) {
            mapOptions.center = new google.maps.LatLng(upaI.lat, upaI.lng);
            mapOptions.zoom = 14;
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var markerUpas = new google.maps.Marker({
                position: upaI,
                map: map,
                title: 'UPA de Toledo PR'
            });
        } else if(flag == 2) {
            mapOptions.center = new google.maps.LatLng(ubs.lat, ubs.lng);
            mapOptions.zoom = 14;
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var markerUbss = new google.maps.Marker({
                position: ubs,
                map: map,
                title: 'UBS de Toledo PR'
            });
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script>
    var firstLanguage = 'Portuguese';
    var firstBT = 'Translate';
    var secondLanguage = 'French';
    $("span.languageFirst").text(firstLanguage);
    $("span.firstBT").text(firstBT);
    $("span.languageSecond").text(secondLanguage);
    var invert = function() {
        var tmp = firstLanguage;
        firstLanguage = secondLanguage;
        secondLanguage = tmp;
        $("span.languageFirst").text(firstLanguage);
        $("span.languageSecond").text(secondLanguage);
        $("span.origem").text(origem);
        $("span.destino").text(destino);
    };
</script>

</html>
