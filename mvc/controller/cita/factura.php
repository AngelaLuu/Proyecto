<?php

use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;



class 
 function __construct()
 {

 }

 function index ()
 {
    Redirect::to('home');
 }

 function importar_csv()
 {
    $data = 
    [
    'title' => 'Importar desde CSV'
    ];

    view::render ('importar_csv', $data);
 }

 function post_crear_pdf()
 {
    try {
        $modo  = clean($_POST["modo"]);
        $documento = clean($_POST['documento']);
        $nombre = clean($_POST['nombre']);
        $apellido = clean($_POST['apellido']);
        $correo = clean($_POST['correo']);
        $telefono = clean($_POST['telefono']);
        $especialidad = clean($_POST['especialidad']);
        $contraseña = clean($_POST['password']);
        $horacita = clean($_POST ['hora']);
        $download = $modo === 'si' ? true : false;
        $contenido = '<!DOCTYPE html>
        <html>
        <head>
          <style>
            table {
              width: 100%%;
              text-align: center;
            } 
          </style>
        </head>
        <body>
        <?php
          <img src="%s" alt="%s" style="width: 100px;"><br>
       
          <h1>Bienvenido de nuevo a %s</h1>
          <p>Versión <b>%s</b></p>
          <p>%s</p>
          <table>
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Especialidad</th>
                <th>Hora Cita</th>

              </tr>
            </thead>
            <tbody>
            <tr>
              <td>'nombre'</td>
              <td>'apellido'</td>
              <td>'documento'</td>
              <td>'Especialidad'</td>
              <td>'hora'</td>
            </tr>
        
        ?>
        </html>'
        $contenido = sprintf($contenido, get_image('bee_logo.png'), get_bee_name(), get_bee_name(), get_bee_version(), $documento);
 
      // Nombre del pdf
      $filename = generate_filename().'.pdf';
   
      // Opciones para prevenir errores con carga de imágenes
      $options = new Options();
      $options->set('isRemoteEnabled', true);
 
      // Instancia de la clase
      $dompdf = new Dompdf($options);
 
      // Cargar el contenido HTML
      $dompdf->loadHtml($contenido);
 
      // Formato y tamaño del PDF
      $dompdf->setPaper('A4', 'portrait');
 
      // Renderizar HTML como PDF
      $dompdf->render();
 
      // Salida para descargar
      $dompdf->stream($filename, ['Attachment' => $download]);
 

        catch (Exception $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::to('home');
        } catch (DomException $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::to('home');
        }
    }
 }
