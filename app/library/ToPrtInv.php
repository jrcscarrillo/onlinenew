<?php

use Phalcon\Mvc\User\Component as componente;

ini_set("pcre.backtrack_limit", "5000000");

class ToPrtInv extends componente {

    protected $iniDate;
    protected $finDate;
    protected $bodega;
    protected $producto;
    protected $caso;
    protected $usuario;
    protected $archivos;
    protected $sales_desc;

    function imprimeMovBodega($params) {

        $auth = $this->session->get('auth');
        $this->usuario = $auth['username'];
        $this->iniDate = $params['iniDate'];
        $this->finDate = $params['finDate'];
        $this->bodega = $params['bodega'];
        $this->producto = $params['producto'];
        $pasar = array("caso" => 0, "iniDate" => $params['iniDate'], "finDate" => $params['finDate'], "bodega" => $params['bodega'], "producto" => $params['producto'],);
        if ($this->bodega === 'TODOS' and $this->producto === 'TODOS') {
            $pasar['caso'] = 1;
        } elseif ($this->bodega === 'TODOS') {
            $pasar['caso'] = 2;
        } elseif ($this->producto === 'TODOS') {
            $pasar['caso'] = 3;
        } else {
            $pasar['caso'] = 4;
        }
        $this->todoBodegaProducto($pasar);
    }

    function todoBodegaProductoPdfs($param) {

        if ($param['caso'] === 3 or $param['caso'] === 4) {
            $args = array('conditions' => 'Status = "CON-MOV" AND ListID = ?1',
               'bind' => array(
                  1 => $this->bodega));
        } else {
            $args = array('conditions' => 'Status = "CON-MOV"');
        }
        $bodegas = Bodegas::find($args);
        $this->caso = 0;
        foreach ($bodegas as $bodega) {
            if ($param['caso'] === 1 or $param['caso'] === 3) {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND TxnDate BETWEEN ?2 AND ?3',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->iniDate,
                      3 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            } else {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->producto,
                      3 => $this->iniDate,
                      4 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            }
            $lotes = Lotestrx::find($args);
            if (count($lotes) > 0) {
                $this->listaPdfs($args, $this->caso);
            }
        }
//        $filename = trim($this->usuario) . trim($this->bodega) . '.pdf';
//        $cmd = "gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile=" . $filename . " " . implode(" ", $this->archivos);
//        shell_exec($cmd);
//        header('Content-type:application/pdf');
//        header('Content-disposition: inline; filename="' . $filename . '"');
//        header('content-Transfer-Encoding:binary');
//        header('Accept-Ranges:bytes');
//        echo file_get_contents($filename);
    }

    function generaMpdf() {
        $mpdf = new \Mpdf\Mpdf([
           'orientation' => 'L',
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 22,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);

        $shtml = $this->sacaCabeceraG();
        $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">Desde : ' . date('d-m-Y', strtotime($this->iniDate)) . '    Hasta : ' . date('d-m-Y', strtotime($this->finDate)) . '       Movimientos - Bodega</div>' . $shtml);
        $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Aurora - MultiBodegas</td></tr></table>');
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Produccion");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetDisplayMode('fullpage');
//        $mpdf->packTableData = true;
        $mpdf->simpleTables = true;
//        $archivo = APP_PATH . 'public\css\reporte.css';
        $archivo = APP_PATH . 'public/css/reporte.css';
        $stylesheet = file_get_contents($archivo);
        $mpdf->WriteHTML($stylesheet, 1);
        return $mpdf;
    }

    function listaPdfs($args, $caso) {


        $lotes = Lotestrx::find($args);
        $ctrl_producto = 'BLANCO';
        $ctrl_bodega = 'BLANCO';
        $w_egr = 0;
        $w_ing = 0;

        $row1_1 = '<tr> <td class="izq1" width="10%"></td><td class="izq1" width="10%">PRODUCTO</td><td class="izq1" width="20%">';
        $row1_2 = '</td><td class="izq1" width="20%"></td><td class="der" width="10%"><td class="der" width="10%"></td><td class="der" width="10%"></td></tr>';
        $row2_1 = '<tr><td class="izq1" width="10%">';
        $row2_2 = '</td><td class="izq1" width="10%">SALDO INICIAL</td><td class="izq1" width="20%">';
        $row2_2A = '</td><td class="izq1" width="10%">SALDO CALCULADO</td><td class="izq1" width="20%">';
        $row2_3 = '</td><td class="izq1" width="20%"></td><td class="der" width="10%"><td class="der" width="10%"></td><td class="der" width="10%">';

        $pasar = array("caso" => 0, "iniDate" => $this->iniDate, "finDate" => $this->finDate, "bodega" => "", "producto" => "");
        $this->archivos = array();
        $na = 0;
        foreach ($lotes as $lote) {
            /**
             *      CONTROL DEL NIVEL DE LA BODEGA
             */
            if ($ctrl_producto === 'BLANCO') {
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $itemLote = $lote->items;
                $html = '
            <html>
            <head></head>
            <body>
            <table width="100%">
            <tbody>';
                $mpdf = $this->generaMpdf();
                $this->sales_desc = $itemLote->sales_desc;
                $html .= $row1_1 . $itemLote->sales_desc . $row1_2;

                $html .= $row2_1 . date('d-m-Y', strtotime($this->iniDate));

                $shtml = $this->buscaBodega($ctrl_bodega);

                $html .= $row2_2 . $shtml . $row2_3 . number_format($movimiento['Disponible'], 0, '.', '.') . '</td></tr>';
            }
            if ($ctrl_producto != $lote->getItemRefListID()) {
                $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
                $html .= $row2_1 . date('d-m-Y', strtotime($this->finDate));

                $shtml = $this->buscaBodega($ctrl_bodega, 1);

                $html .= $row2_2A . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr><tr><td colspan="7"><hr></td></tr>';
                $html .= '</tbody></table></body></html>';
                try {
                    $mpdf->WriteHTML($html);
                } catch (Exception $ex) {
                    $html = '<div class="row"><div class="col-md-3 fontlogo">Los Coqueiros - Errores en la impresion - por numero de lineas</div>';
                    $html .= '<div class="col-md-8">' . $ex->getMessage() . '</div>
                <div class="col-md-1">
                    <span>Informar a Soporte</span>
                </div></div>';
                    $mpdf->WriteHTML($html);
                }
                $filename = trim($this->usuario) . trim($this->sales_desc) . '.pdf';
                $this->archivos[$na] = $filename;
                $na++;
                $mpdf->Output($filename, 'F');
                header('Content-type:application/pdf');
                header('Content-disposition: inline; filename="' . $filename . '"');
                header('content-Transfer-Encoding:binary');
                header('Accept-Ranges:bytes');
                echo file_get_contents($filename);
                $html = '
            <html>
            <head></head>
            <body>
            <table width="100%">
            <tbody>';
                $mpdf = $this->generaMpdf();
                $w_ing = 0;
                $w_egr = 0;
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $calculado = $movimiento['Disponible'];
                $itemLote = $lote->items;
                $this->sales_desc = $itemLote->sales_desc;
                $html .= $row1_1 . $itemLote->sales_desc . $row1_2;

                $html .= $row2_1 . date('d-m-Y', strtotime($this->iniDate));

                $shtml = $this->buscaBodega($ctrl_bodega, 1);

                $html .= $row2_2 . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr>';
            }
            $html .= '<tr> <td class="izq1" width="10%">';
            $html .= date('d-m-Y', strtotime($lote->TxnDate));
            $html .= '</td><td class="izq1" width="10%">';
            $html .= $lote->RefNumber;
            $html .= '</td><td class="izq1" width="20%">';
            $shtml = $this->buscaBodega($lote->getOrigenSub());
            $html .= $shtml . '</td><td class="izq1" width="20%">';
            if ($lote->getTipoTrx() === 'FACTURA' or $lote->getTipoTrx() === 'NOTA-CREDITO') {
                $shtml = $this->buscaCliente($lote->getDestinoTrx());
            } else {
                $shtml = $this->buscaBodega($lote->getDestinoSub(), 1);
            }
            $html .= $shtml . '</td><td class="der" width="10%">';

            if ($ctrl_bodega === $lote->getOrigenTrx()) {
                $w_egr += $lote->getQtyTrx();
                $calculado = $calculado - $lote->getQtyTrx();

                $html .= number_format($lote->QtyTrx, 0, '.', '.') . '</td><td class="der" width="10%"></td><td class="der" width="10%">';

                $html .= number_format($calculado, 0, '.', '.') . '</td></tr>';
            } else {
                $w_ing += $lote->getQtyTrx();
                $calculado = $calculado + $lote->getQtyTrx();
                $html .= '</td><td class="der" width="10%">';
                $html .= number_format($lote->QtyTrx, 0, '.', '.') . '</td><td class="der" width="10%">';

                $html .= number_format($calculado, 0, '.', '.') . '</td></tr>';
            }
        }

        $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
        $html .= $row2_1 . date('d-m-Y', strtotime($this->finDate));

        $shtml = $this->buscaBodega($ctrl_bodega, 1);

        $html .= $row2_2A . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr><tr><td colspan="7"><hr></td></tr>';

        $html .= '</tbody></table></body></html>';
        try {
            $mpdf->WriteHTML($html);
        } catch (Exception $ex) {
            $html = '<div class="row"><div class="col-md-3 fontlogo">Los Coqueiros - Errores en la impresion - por numero de lineas</div>';
            $html .= '<div class="col-md-8">' . $ex->getMessage() . '</div>
                <div class="col-md-1">
                    <span>Informar a Soporte</span>
                </div></div>';
            $mpdf->WriteHTML($html);
        }
        $filename = trim($this->usuario) . trim($this->sales_desc) . '.pdf';
        $this->archivos[$na] = $filename;
        $na++;
        $mpdf->Output($filename, 'F');
        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="' . $filename . '"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        echo file_get_contents($filename);
        return;
    }

    function todoBodegaProductoPrince($param) {

        if ($param['caso'] === 3 or $param['caso'] === 4) {
            $args = array('conditions' => 'Status = "CON-MOV" AND ListID = ?1',
               'bind' => array(
                  1 => $this->bodega));
        } else {
            $args = array('conditions' => 'Status = "CON-MOV"');
        }
        $bodegas = Bodegas::find($args);
        $this->caso = 0;
        foreach ($bodegas as $bodega) {
            if ($param['caso'] === 1 or $param['caso'] === 3) {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND TxnDate BETWEEN ?2 AND ?3',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->iniDate,
                      3 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            } else {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->producto,
                      3 => $this->iniDate,
                      4 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            }
            $lotes = Lotestrx::find($args);
            if (count($lotes) > 0) {
                $this->listaPrince($args, $this->caso);
                $this->caso ++;
            }
        }
    }

    function listaPrince($args, $caso) {
        /**
         *      Si es la primera vez se lee el archivo de plantilla en html de las cabeceras del reporte
         *      en las siguientes veces se lee el archivo generado identificado por la bodega   
         */
        $htmldetalle = '
            <div class="row" id="detalle">
            <div class="col-sm-1" id="numref"></div>
            <div class="col-sm-1" id="fechaemision"></div>
            <div class="col-sm-5" id="bodega">
                <div class="col-sm-6" id="origen"></div>
                <div class="col-sm-6" id="destino"></div>
            </div>
            <div class="col-sm-3" id="cantidades">
                <div class="col-sm-4" id="Ingresos"></div>
                <div class="col-sm-4" id="Egresos"></div>
                <div class="col-sm-4" id="Saldo"></div>
            </div>
            <div class="col-sm-2" id="Notas"></div>
        </div>';
        $autorizado = 'nivel1' . $this->bodega . '.html';
        $lotes = Lotestrx::find($args);
        if ($caso === 0) {
            $doc1 = new DOMDocument();
            $doc1->loadHTMLFile('plantillareporte.html');
        } else {
            $doc1 = new DOMDocument();
            $doc1->loadHTMLFile($autorizado);
        }
        $E_root = $doc1->getElementById('root');
        $doc2 = new DOMDocument();
        $doc2->loadHTML($htmldetalle);
        $E_detalle = $doc2->getElementById('detalle');
        $E_numref = $doc2->getElementById('numref');
        $E_fecemi = $doc2->getElementById('fechaemision');
        $E_origen = $doc2->getElementById('origen');
        $E_destin = $doc2->getElementById('destino');
        $E_ingres = $doc2->getElementById('Ingresos');
        $E_egreso = $doc2->getElementById('Egresos');
        $E_saldos = $doc2->getElementById('Saldo');
        $E_notas = $doc2->getElementById('Notas');
        $ctrl_producto = 'BLANCO';
        $ctrl_bodega = 'BLANCO';
        $w_egr = 0;
        $w_ing = 0;

        $pasar = array("caso" => 0, "iniDate" => $this->iniDate, "finDate" => $this->finDate, "bodega" => "", "producto" => "");
        foreach ($lotes as $lote) {
            $E_numref->nodeValue = '';
            $E_fecemi->nodeValue = '';
            $E_origen->nodeValue = '';
            $E_destin->nodeValue = '';
            $E_ingres->nodeValue = '';
            $E_egreso->nodeValue = '';
            $E_saldos->nodeValue = '';
            $E_notas->nodeValue = '';
            if ($ctrl_producto === 'BLANCO') {
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $itemLote = $lote->items;
                $E_origen->nodeValue = 'PRODUCTO';
                $E_destin->nodeValue = $itemLote->sales_desc;
                $E_producto = $doc1->importNode($E_detalle, true);
                $E_root->appendChild($E_producto);
                $E_origen->nodeValue = $this->buscaBodega($ctrl_bodega);
                $E_destin->nodeValue = '';
                $E_saldos->nodeValue = number_format($movimiento['Disponible'], 0, '.', '.');
                $E_notas->nodeValue = 'SALDO INICIAL AL ' . date('d-m-Y', strtotime($this->iniDate));
                $E_producto = $doc1->importNode($E_detalle, true);
                $E_root->appendChild($E_producto);
            }
            if ($ctrl_producto != $lote->getItemRefListID()) {
                $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
                $E_origen->nodeValue = $this->buscaBodega($ctrl_bodega);
                $E_destin->nodeValue = '';
                $E_saldos->nodeValue = number_format($calculado, 0, '.', '.');
                $E_notas->nodeValue = 'SALDO FINAL AL ' . date('d-m-Y', strtotime($this->finDate));
                $E_producto = $doc1->importNode($E_detalle, true);
                $E_root->appendChild($E_producto);
                $w_ing = 0;
                $w_egr = 0;
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $calculado = $movimiento['Disponible'];
                $itemLote = $lote->items;
                $E_origen->nodeValue = 'PRODUCTO';
                $E_destin->nodeValue = $itemLote->sales_desc;
                $E_producto = $doc1->importNode($E_detalle, true);
                $E_root->appendChild($E_producto);
                $E_origen->nodeValue = $this->buscaBodega($ctrl_bodega);
                $E_destin->nodeValue = '';
                $E_saldos->nodeValue = number_format($movimiento['Disponible'], 0, '.', '.');
                $E_notas->nodeValue = 'SALDO INICIAL AL ' . date('d-m-Y', strtotime($this->iniDate));
                $E_producto = $doc1->importNode($E_detalle, true);
                $E_root->appendChild($E_producto);
            }
            $E_numref->nodeValue = $lote->RefNumber;
            $E_fecemi->nodeValue = date('d-m-Y', strtotime($lote->TxnDate));
            $E_origen->nodeValue = $this->buscaBodega($lote->getOrigenSub());
            $E_notas->nodeValue = $lote->TipoTrx;
            if ($lote->getTipoTrx() === 'FACTURA' or $lote->getTipoTrx() === 'NOTA-CREDITO') {
                $E_destin->nodeValue = $this->buscaCliente($lote->getDestinoTrx());
            } else {
                $E_destin->nodeValue = $this->buscaBodega($lote->getDestinoSub());
            }

            if ($ctrl_bodega === $lote->getOrigenTrx()) {
                $w_egr += $lote->getQtyTrx();
                $calculado = $calculado - $lote->getQtyTrx();

                $E_egreso->nodeValue = number_format($lote->QtyTrx, 0, '.', '.');

                $E_saldos->nodeValue = number_format($calculado, 0, '.', '.');
            } else {
                $w_ing += $lote->getQtyTrx();
                $calculado = $calculado + $lote->getQtyTrx();
                $E_ingres->nodeValue = number_format($lote->QtyTrx, 0, '.', '.');

                $E_saldos->nodeValue = number_format($calculado, 0, '.', '.');
            }
            $E_producto = $doc1->importNode($E_detalle, true);
            $E_root->appendChild($E_producto);
        }
        $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
        $E_origen->nodeValue = $this->buscaBodega($ctrl_bodega);
        $E_destin->nodeValue = '';
        $E_saldos->nodeValue = number_format($calculado, 0, '.', '.');
        $E_notas->nodeValue = 'SALDO FINAL AL ' . date('d-m-Y', strtotime($this->finDate));
        $E_producto = $doc1->importNode($E_detalle, true);
        $E_root->appendChild($E_producto);
        $doc1->saveHTMLFile($autorizado);
        $otrohtml = file_get_contents($autorizado);
        $mpdf = new \Mpdf\Mpdf([
           'orientation' => 'L',
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 22,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);
        $mpdf->WriteHTML($otrohtml);
        $filename = 'bodega' . trim($this->bodega) . '.pdf';
        $mpdf->Output($filename, 'F');

        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="' . $filename . '"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        echo file_get_contents($filename);
        return true;
    }

    function todoBodegaProducto($param) {

        if ($param['caso'] === 3 or $param['caso'] === 4) {
            $args = array('conditions' => 'Status = "CON-MOV" AND ListID = ?1',
               'bind' => array(
                  1 => $this->bodega));
        } else {
            $args = array('conditions' => 'Status = "CON-MOV"');
        }
        $bodegas = Bodegas::find($args);
        $html = '<html>
                    <head>
                    </head>
                    <body>';
        $mpdf = new \Mpdf\Mpdf([
           'orientation' => 'L',
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 22,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);

        $shtml = $this->sacaCabeceraG();
        $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">Desde : ' . date('d-m-Y', strtotime($this->iniDate)) . '    Hasta : ' . date('d-m-Y', strtotime($this->finDate)) . '       Movimientos - Bodega</div>' . $shtml);
        $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Aurora - MultiBodegas</td></tr></table>');
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Produccion");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetDisplayMode('fullpage');
//        $mpdf->packTableData = true;
        $mpdf->simpleTables = true;
//        $archivo = APP_PATH . 'public\css\reporte.css';
        $archivo = APP_PATH . 'public/css/reporte.css';
        $stylesheet = file_get_contents($archivo);
        $mpdf->WriteHTML($stylesheet, 1);

        $this->caso = 0;
        foreach ($bodegas as $bodega) {
            if ($param['caso'] === 1 or $param['caso'] === 3) {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND TxnDate BETWEEN ?2 AND ?3',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->iniDate,
                      3 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            } else {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4',
                   'bind' => array(
                      1 => $bodega->getListID(),
                      2 => $this->producto,
                      3 => $this->iniDate,
                      4 => $this->finDate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            }
            $lotes = Lotestrx::find($args);
            if (count($lotes) > 0) {
//                $this->flash->notice('Movimientos ' . count($lotes) . ' de la bodega ' . $bodega->getName() . ' con todos los productos');
                $my_html = $this->lista($args, $this->caso, $mpdf);
//                $html .= $my_html;
                $this->caso ++;
            } else {
//                $this->flash->error('Sin Movimientos de la bodega ' . $bodega->getName() . ' con todos los productos');
            }
        }
        $html = '</body></html>';

        try {
            $mpdf->WriteHTML($html);
        } catch (Exception $ex) {
            $html = '<div class="row"><div class="col-md-3 fontlogo">Los Coqueiros - Errores en la impresion</div>';
            $html .= '<div class="col-md-8">' . $ex->getMessage() . '</div>
                <div class="col-md-1">
                    <span>Informar a Soporte</span>
                </div></div>';
            $mpdf->WriteHTML($html);
        }
//        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
        $filename = 'movimientos' . trim($this->bodega) . '.pdf';
        $mpdf->Output($filename, 'F');

        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="' . $filename . '"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        echo file_get_contents($filename);
    }

    function lista($args, $caso, $mpdf, $ohtml) {


        $lotes = Lotestrx::find($args);
        if ($caso === 0) {
            $html = $ohtml . '<table width="100%"><tbody>';
        } else {
            $html = '<p style="page-break-after: always;">&nbsp;</p><table width="100%"><tbody>';
        }
        $ctrl_producto = 'BLANCO';
        $ctrl_bodega = 'BLANCO';
        $w_egr = 0;
        $w_ing = 0;

        $row1_1 = '<tr> <td class="izq1" width="10%"></td><td class="izq1" width="10%">PRODUCTO</td><td class="izq1" width="20%">';
        $row1_2 = '</td><td class="izq1" width="20%"></td><td class="der" width="10%"><td class="der" width="10%"></td><td class="der" width="10%"></td></tr>';
        $row2_1 = '<tr><td class="izq1" width="10%">';
        $row2_2 = '</td><td class="izq1" width="10%">SALDO INICIAL</td><td class="izq1" width="20%">';
        $row2_2A = '</td><td class="izq1" width="10%">SALDO CALCULADO</td><td class="izq1" width="20%">';
        $row2_3 = '</td><td class="izq1" width="20%"></td><td class="der" width="10%"><td class="der" width="10%"></td><td class="der" width="10%">';

        $pasar = array("caso" => 0, "iniDate" => $this->iniDate, "finDate" => $this->finDate, "bodega" => "", "producto" => "");
        $nrolineas = 0;
        foreach ($lotes as $lote) {
            /**
             *      CONTROL DEL NIVEL DE LA BODEGA
             */
            $nrolineas++;
            if ($ctrl_producto === 'BLANCO') {
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $itemLote = $lote->items;

                $html .= $row1_1 . $itemLote->sales_desc . $row1_2;

                $html .= $row2_1 . date('d-m-Y', strtotime($this->iniDate));

                $shtml = $this->buscaBodega($ctrl_bodega);

                $html .= $row2_2 . $shtml . $row2_3 . number_format($movimiento['Disponible'], 0, '.', '.') . '</td></tr>';
                $calculado = $movimiento['Disponible'];
            }
            if ($ctrl_producto != $lote->getItemRefListID()) {
                $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
                $html .= $row2_1 . date('d-m-Y', strtotime($this->finDate));

                $shtml = $this->buscaBodega($ctrl_bodega, 1);

                $html .= $row2_2A . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr><tr><td colspan="7"><hr></td></tr>';

                $w_ing = 0;
                $w_egr = 0;
                $ctrl_producto = $lote->getItemRefListID();
                $pasar['bodega'] = $args['bind'][1];
                $ctrl_bodega = $args['bind'][1];
                $pasar['producto'] = $ctrl_producto;
                $movimiento = $lote->existenciasBodega($pasar);
                $calculado = $movimiento['Disponible'];
                $itemLote = $lote->items;

                $html .= $row1_1 . $itemLote->sales_desc . $row1_2;

                $html .= $row2_1 . date('d-m-Y', strtotime($this->iniDate));

                $shtml = $this->buscaBodega($ctrl_bodega, 1);

                $html .= $row2_2 . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr>';
            }
            $html .= '<tr> <td class="izq1" width="10%">';
            $html .= date('d-m-Y', strtotime($lote->TxnDate));
            $html .= '</td><td class="izq1" width="10%">';
            $html .= $lote->RefNumber;
            $html .= '</td><td class="izq1" width="20%">';
            $shtml = $this->buscaBodega($lote->getOrigenSub());
            $html .= $shtml . '</td><td class="izq1" width="20%">';
            if ($lote->getTipoTrx() === 'FACTURA' or $lote->getTipoTrx() === 'NOTA-CREDITO') {
                $shtml = $this->buscaCliente($lote->getDestinoTrx());
            } else {
                $shtml = $this->buscaBodega($lote->getDestinoSub(), 1);
            }
            $html .= $shtml . '</td><td class="der" width="10%">';

            if ($ctrl_bodega === $lote->getOrigenTrx()) {
                $w_egr += $lote->tQtyTrx;
                $calculado = $calculado - $lote->QtyTrx;

                $html .= number_format($lote->QtyTrx, 0, '.', '.') . '</td><td class="der" width="10%"></td><td class="der" width="10%">';

                $html .= number_format($calculado, 0, '.', '.') . '</td></tr>';
            } else {
                $w_ing += $lote->getQtyTrx();
                $calculado = $calculado + $lote->getQtyTrx();
                $html .= '</td><td class="der" width="10%">';
                $html .= number_format($lote->QtyTrx, 0, '.', '.') . '</td><td class="der" width="10%">';

                $html .= number_format($calculado, 0, '.', '.') . '</td></tr>';
            }
            if ($nrolineas > 199) {
                try {
                    $mpdf->WriteHTML($html);
                } catch (Exception $ex) {
                    $html = '<div class="row"><div class="col-md-3 fontlogo">Los Coqueiros - Errores en la impresion - por numero de lineas</div>';
                    $html .= '<div class="col-md-8">' . $ex->getMessage() . '</div>
                <div class="col-md-1">
                    <span>Informar a Soporte</span>
                </div></div>';
                    $mpdf->WriteHTML($html);
                }
                $html = '';
                $nrolineas = 0;
            }
        }

        $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
        $html .= $row2_1 . date('d-m-Y', strtotime($this->finDate));

        $shtml = $this->buscaBodega($ctrl_bodega, 1);

        $html .= $row2_2A . $shtml . $row2_3 . number_format($calculado, 0, '.', '.') . '</td></tr><tr><td colspan="7"><hr></td></tr>';

        $html .= '</tbody></table>';

        $mpdf->WriteHTML($html);
        return $html;
    }

    function imprimeInventarioInicial($params) {

        $this->iniDate = $params['iniDate'];
        $this->finDate = $params['finDate'];
        $this->bodega = $params['bodega'];
        $this->producto = $params['producto'];
        $html = '<html>
                    <head>
                    </head>
                    <body>';
        $mov = 'INVENTARIO-INICIAL';
        if ($this->bodega === 'TODOS' and $this->producto === 'TODOS') {
            $args = array('conditions' => 'TxnDate BETWEEN ?1 AND ?2 AND TipoTrx = ?3',
               'bind' => array(
                  1 => $this->iniDate,
                  2 => $this->finDate,
                  3 => $mov),
               'order' => '[RefNumber]'
            );
        } elseif ($this->bodega === 'TODOS') {
            $args = array('conditions' => 'ItemRef_ListID = ?1 AND TxnDate BETWEEN ?2 AND ?3 AND TipoTrx = ?4',
               'bind' => array(
                  1 => $this->producto,
                  2 => $this->iniDate,
                  3 => $this->finDate,
                  4 => $mov),
               'order' => '[RefNumber]'
            );
        } elseif ($this->producto === 'TODOS') {
            $args = array('conditions' => 'DestinoTrx = ?1 AND TxnDate BETWEEN ?2 AND ?3 AND TipoTrx = ?4',
               'bind' => array(
                  1 => $this->bodega,
                  2 => $this->iniDate,
                  3 => $this->finDate,
                  4 => $mov),
               'order' => '[RefNumber]'
            );
        } else {
            $args = array('conditions' => 'DestinoTrx = ?1 AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4 AND TipoTrx = ?5',
               'bind' => array(
                  1 => $this->bodega,
                  2 => $this->producto,
                  3 => $this->iniDate,
                  4 => $this->finDate,
                  5 => $mov),
               'order' => '[RefNumber]'
            );
        }

        $lotes = Lotestrx::find($args);
        $html .= '<table width="100%"><tbody>';
        foreach ($lotes as $lote) {
            $itemLote = $lote->items;
            $html .= '<tr> <td class="izq1" width="10%">';
            $html .= date('d-m-Y', strtotime($lote->TxnDate));
            $html .= '</td><td class="izq1" width="20%">';
            $html .= $lote->RefNumber;
            $html .= '</td><td class="izq1" width="20%">';
            $html .= $itemLote->sales_desc;
            $html .= '</td><td class="izq1" width="10%">';
            $html .= number_format($lote->QtyTrx, 0, '.', '.');
            $html .= '</td><td class="izq1" width="25%">';
            $shtml = $this->buscaBodega($lote->DestinoTrx);
            $html .= $shtml . '</td>';
            $html .= '<td class="der" width="15%">';
            $html .= '.........................</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table></body>
                 </html>';

        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 22,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);
        $shtml = $this->sacaCabecera();
        $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">Desde : ' . date('d-m-Y', strtotime($this->iniDate)) . '    Hasta : ' . date('d-m-Y', strtotime($this->finDate)) . '       Inventarios - Toma Fisica</div>' . $shtml);
        $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Aurora - MultiBodegas</td></tr></table>');
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Produccion");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetDisplayMode('fullpage');
        $archivo = APP_PATH . 'public\css\reporte.css';
        $stylesheet = file_get_contents($archivo);
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html);
        $filename = 'inventarioinicial' . trim($this->bodega) . '.pdf';
        $mpdf->Output($filename, 'F');

        header('Content-type:application/pdf');
        header('Content-disposition: inline; filename="' . $filename . '"');
        header('content-Transfer-Encoding:binary');
        header('Accept-Ranges:bytes');
        echo file_get_contents($filename);
    }

    function sacaCabeceraG() {
        $html = '<table width="100%"><thead><tr><th class="izq" width="10%">
                <p color="#A52A2A"><strong>Fecha</strong></p></th><th class="izq" width="10%">
                <p color="#A52A2A"><strong>Numero Referencia</strong></p></th><th class="izq" width="20%">
                <p color="#A52A2A"><strong>B.Origen</strong></p></th><th class="izq"  width="20%">
                <p color="#A52A2A"><strong>B.Destino</strong></p></th><th class="izq"  width="10%">
                <p color="#A52A2A"><strong>Egresos</strong></p></th><th class="izq"  width="10%">
                <p color="#A52A2A"><strong>Ingresos</strong></p></th><th class="izq"  width="10%">
                <p color="#A52A2A"><strong>Saldo</strong></p></th></tr></thead></table>';
        return $html;
    }

    function sacaCabecera() {
        $html = '<table width="100%"><thead><tr><th class="izq" width="10%">
                <p color="#A52A2A"><strong>Fecha</strong></p></th><th class="izq" width="20%">
                <p color="#A52A2A"><strong>Numero Referencia</strong></p></th><th class="izq" width="20%">
                <p color="#A52A2A"><strong>Producto</strong></p></th><th class="izq"  width="10%">
                <p color="#A52A2A"><strong>Cantidad</strong></p></th><th class="izq"  width="25%">
                <p color="#A52A2A"><strong>Bodega</strong></p></th><th class="izq"  width="15%">
                <p color="#A52A2A"><strong>Aprobado</strong></p></th></tr></thead></table><hr>';
        return $html;
    }

    function buscaBodega($bodega, $tipo = null) {
        $wareh = Bodegas::findFirstByListID($bodega);
        if ($tipo === 1) {
            if (!$wareh) {
                return '<p>ERROR</p>';
            }
            $html = '<p>' . $wareh->Name . '</p>';
            return $html;
        } else {
            if (!$wareh) {
                return 'ERROR';
            }
            return $wareh->Name;
        }
    }

    function buscaCliente($bodega, $tipo = null) {
        $wareh = Customer::findFirstByListID($bodega);
        if ($tipo === 1) {
            if (!$wareh) {
                return '<p>ERROR</p>';
            }
            $html = '<p>' . $wareh->Name . '</p>';
            return $html;
        } else {
            if (!$wareh) {
                return 'ERROR';
            }
            return $wareh->Name;
        }
    }

}
