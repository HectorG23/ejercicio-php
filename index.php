    <?php
    
    CONST API_URL = "https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesion de curl; ch= curl handle
    $ch = curl_init(API_URL);
    //Inicializar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*Ejecutar la peticion
    y guardamos el resultado
    */
    $result=curl_exec($ch);
    $data=json_decode($result,true);

    curl_close($ch);

    
    
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="La proxima pelicula de marvel">
        <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <!-- Centered viewport -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>

    
        <section>
            <img src="<?= $data["poster_url"]; ?>" width="200" alt="poster de <?=$data["title"]; ?> " style="border-radius:16px" />
        </section>
       <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?> dias </h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?> </p>
        <p> La siguiente es: <?= $data["following_production"]["title"];?></p>
       </hgroup>
    </main>

    <style> 
        :root {
          color-scheme: light dark;
        }

        body {
            display: grid;
            place-content: center;
        }
        img{
            margin: 0 auto;
            place-content: center;
        }
        section{
            display:flex;
            justify-content: center;
        }

        hgroup{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>

