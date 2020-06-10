<?php

        if (isset($_GET['id_ot_desinstalacion_mora'])) {

            include '../../../clases/Ot_desinstalacion_mora.php';
            require_once '../../../tcpdf/tcpdf.php';

             $id_ot_desinstalacion_mora = $_GET['id_ot_desinstalacion_mora'];

            $id_cliente;
            $cui_cliente;
            $nombre_cliente;
            $direccion_cliente;
            $descripcion;

            $ot = new Ot_desinstalacion_mora();

            $result = $ot->buscar_para_actualizar($id_ot_desinstalacion_mora);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $id_cliente = $row['id_cliente'];
                    $cui_cliente = $row['cui_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $direccion_cliente = $row['direccion_cliente'];
                    $descripcion = $row['descripcion'];
                }
            }







// create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('WIFINET');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 039', PDF_HEADER_STRING);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);


// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// ---------------------------------------------------------
// add a page
    $pdf->AddPage('P', 'LETTER');

// set font
    $pdf->SetFont('dejavusans', 'B', 20);

    $pdf->Write(0, 'Detalles OT de desinstalación de servicio por mora', '', 0, 'L', true, 0, false, false, 0);

    $pdf->Ln();
    
    
    
     $pdf->SetFont('dejavusans', 'B', 10);

    $pdf->Write(0, 'OT Número:', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
    $html = '<span style="text-align:justify;">'. $id_ot_desinstalacion_mora .'</span>';

// set UTF-8 Unicode font
    $pdf->SetFont('dejavusans', '', 10);

// output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln();
    
    
    


    $pdf->SetFont('dejavusans', 'B', 15);

    $pdf->Write(0, 'Cliente', '', 0, 'L', true, 0, false, false, 0);

    $pdf->Ln();


// ------------------------------- CUI  ----------------------------------------------------------------

    $pdf->SetFont('dejavusans', 'B', 10);

    $pdf->Write(0, 'Cui:', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
    $html = '<span style="text-align:justify;">'. $cui_cliente .'</span>';

// set UTF-8 Unicode font
    $pdf->SetFont('dejavusans', '', 10);

// output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln();



// ------------------------------- Nombre  ----------------------------------------------------------------

    $pdf->SetFont('dejavusans', 'B', 10);

    $pdf->Write(0, 'Nombre:', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
    $html = '<span style="text-align:justify;">'. $nombre_cliente .'</span>';

// set UTF-8 Unicode font
    $pdf->SetFont('dejavusans', '', 10);

// output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln();


// ------------------------------- Direccion  ----------------------------------------------------------------

    $pdf->SetFont('dejavusans', 'B', 10);

    $pdf->Write(0, 'Dirección:', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
    $html = '<span style="text-align:justify;">'. $direccion_cliente .'</span>';

// set UTF-8 Unicode font
    $pdf->SetFont('dejavusans', '', 10);

// output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln();
    

// ------------------------------- Descripcion  ----------------------------------------------------------------

    $pdf->SetFont('dejavusans', 'B', 15);

    $pdf->Write(0, 'Descripción:', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
    $html = '<span style="text-align:justify;">'. trim($descripcion) .'</span>';


// set UTF-8 Unicode font
    $pdf->SetFont('dejavusans', '', 10);

// output the HTML content
    $pdf->writeHTML($html, true, 0, true, true);

    $pdf->Ln();



// reset pointer to the last page
    $pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document
    
    
$fechaactual = getdate();
    
    $pdf->Output('ot cobro cliente cui '. $cui_cliente . ' ' . $fechaactual[mday] . ' de ' . $fechaactual[month] . ' de ' . $fechaactual[year] .'.pdf', 'I');

    
    }else {
            echo '<meta http-equiv="Refresh" content="0;URL=mostrar_ot_nuevo_servicio.php">';
        }
     