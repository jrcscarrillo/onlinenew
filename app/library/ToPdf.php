<?php

use Phalcon\Mvc\User\Component as componente;

/**
 * 
 */
class ToPdf extends componente {

    function creaFactura($condicion) {

        $contribuyente = $this->session->get('contribuyente');
        $fuente = $this->session->get('fuente');
        $a = $this->session->get('archivos');
        $generador = new Picqer\Barcode\BarcodeGeneratorPNG();
        $html = '
<html>
<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
p { margin: 0pt; }
table {
    border-radius: 10px;
}
table.items {
    border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    border-bottom: 0.1mm solid #000000;
}
table thead th { background-color: #fcf8f2;
    text-align: center;
    border: 0.1mm solid #000000;
    font-variant: small-caps;
}

table td.clave { background-color: #fcf8f2;
    text-align: center;
        font-family: Lucida Sans Unicode;
        font-size: 11pt;
        color: #B8860B;
}

table td.izq { background-color: #fcf8f2;
    text-align: left;
    border: 0.1mm solid #000000;
        font-family: Lucida Sans Unicode;
        font-size: 8pt;
}

table td.der { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 16pt;
}

table td.der1 { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 10pt;
}

table td.derch { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 7pt;
}

.doce {
        font-family: Lucida Sans Unicode;
        font-size: 12pt;
}
.items td.blanktotal {
    background-color: #EEEEEE;
    border: 0.1mm solid #000000;
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
.items td.cost {
    text-align: "." center;
}

td .barcode {
    padding: 1.5mm 2mm 1.5mm 12mm;
    vertical-align: top;
    background-color: #FFFFFF;
    color: #000000;
}
.barcodecell {
    text-align: center;
    vertical-align: middle;
    padding: 0;
}

</style>
</head>
<body>

<table width="100%"><tr>
<td width="48%" style="color:#0000BB;" text-align:"center">
<img width="250" height="200" src="';

        $html .= 'https://carrillosteam.com/public/coop/images/logos/auroralogo.jpg" align="middle"><br />
<table width="100%" style="font-family: serif;">
<tr>
<td class="izq">
<p color="#A52A2A" class="doce"><strong>';
        $html .= $contribuyente['razon'] . '</strong></p>
<p color="#A52A2A" class="doce"><strong>';
        $html .= $contribuyente['NombreComercial'] . '</strong></p>
<p color="#A52A2A" class="doce"><strong>Direccion Matriz : </strong></p><p class="doce"><span color="#B8860B">';
        $html .= $contribuyente['DirMatriz'] . '</span></p>
<p color="#A52A2A" class="doce"><strong>Direccion Emisor : </strong></p><p class="doce"><span color="#B8860B">';
        $html .= $contribuyente['DirEmisor'] . '</span></p>
<p color="#A52A2A" class="doce"><strong>Obligado a llevar contabilidad : </strong><span color="#B8860B">';
        $html .= $contribuyente['LlevaContabilidad'] . '</span></p></td>
</tr>';
        if ($fuente['CustomField15'] == "AUTORIZADO") {
            $html .= '<tr><p color="#FFFFFF">Relleno</p></tr>';
        }
        $html .= '</table>
</td>
<td width="1%">&nbsp;</td>
<td width="51%" class="izq">
<table style="font-family: serif;">
<tr>
<td class="der"><span color="#A52A2A"><strong>RUC : </strong></span><span color="#B8860B">';

        $html .= $fuente['ruc'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Nro. Factura : </strong></span><span color="#B8860B">';

        $html .= $fuente['estab'] . '-' . $fuente['ptoEmi'] . '-' . $fuente['secuencial'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Clave Acceso : </strong></span></td>
</tr>

<tr>
<tr><td class="barcode"><img src="data:image/png;base64,' . base64_encode($generador->getBarcode($fuente['claveAcceso'], $generador::TYPE_CODE_128, 1, 60)) . '"></td></tr>
<tr>
<td class="clave"><span>';

        $html .= $fuente['claveAcceso'] . '</span></td>
</tr>
<tr>';
        if ($fuente['CustomField15'] == "AUTORIZADO") {
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Numero Autorizacion: </strong></span></td></tr><tr>
        <td class="clave"><span>';
            $html .= $fuente['claveAcceso'] . '</span></td></tr><tr>';
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Fecha y hora de Autorizacion: </strong></span></td></tr><tr>
        <td class="clave"><span>';
            $html .= $fuente['CustomField13'] . '</span></td></tr><tr>';
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Ambiente : </strong></span><span color="#B8860B">';
            if ($contribuyente['ambiente'] == 1) {
                $porambiente = 'PRUEBAS';
            } else {
                $porambiente = 'PRODUCCION';
            }
            $html .= $porambiente . '</span></td>
</tr>
<tr>
<td class="der1"><span color="#A52A2A"><strong>Emision : </strong></span><span color="#B8860B">';
            if ($contribuyente['emision'] == 1) {
                $poremision = 'NORMAL';
            } else {
                $poremision = 'CONTINGENCIA';
            }
            $html .= $poremision . '</span></td>
</tr></table>';
        } else {
            $html .= '<td class="der"><span color="#A52A2A"><strong>Ambiente : </strong></span><span color="#B8860B">';
            if ($contribuyente['ambiente'] == 1) {
                $porambiente = 'PRUEBAS';
            } else {
                $porambiente = 'PRODUCCION';
            }
            $html .= $porambiente . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Emision : </strong></span><span color="#B8860B">';
            if ($contribuyente['emision'] == 1) {
                $poremision = 'NORMAL';
            } else {
                $poremision = 'CONTINGENCIA';
            }
            $html .= $poremision . '</span></td>
</tr></table>';
        }

        $html .= '</tr></table>

<table width="100%">
<tr>
<td class="derch"><span color="#A52A2A"><strong>Razon Social : </strong></span><span color="#B8860B">';

        $html .= $fuente['razonSocialComprador'] . '</span></td>
<td class="derch"><span color="#A52A2A"><strong>Identificacion : </strong></span><span color="#B8860B">';

        $html .= $fuente['idComprador'] . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Nombre Comercial : </strong></span><span color="#B8860B">';

        $html .= $fuente['CustomField9'] . '</span></td>
<td class="derch"><span color="#A52A2A"><strong>Fecha de Pago : </strong></span><span color="#B8860B">';

        $html .= $fuente['fechaPago'] . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Direccion : </strong></span><span color="#B8860B">';

        $html .= $fuente['ciudad'] . ", " . $fuente['dirEstablecimiento'] . '</span></td>
<td class="derch"><span color="#A52A2A"><strong>Fecha Emision : </strong></span><span color="#B8860B">';

        $html .= $fuente['fechaEmision'] . '</span></td>
</tr>
</table>

<br />

<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2">
<thead>';
        if ($fuente['CustomField2'] === "CON ORDEN DE COMPRA") {
            $html .= '<tr>
                <th align="center" width="12%" style="font-weight: bold;">Codigo</th>
                <th align="center" width="8%" style="font-weight: bold;">Auxiliar</th>
                <th align="center" width="36%" style="font-weight: bold;">Descripcion</th>
                <th align="right" width="8%" style="font-weight: bold;">Cantidad</th>
                <th align="right" width="8%" style="font-weight: bold;">Precio</th>
                <th align="right" width="9%" style="font-weight: bold;">Dscto.</th>
                <th align="right" width="9%" style="font-weight: bold;">Precio Total</th>
            </tr>';
        } else {
            $html .= '<tr>
                <th align="center" width="14%" style="font-weight: bold;">Codigo</th>
                <th align="center" width="40%" style="font-weight: bold;">Descripcion</th>
                <th align="right" width="9%" style="font-weight: bold;">Cantidad</th>
                <th align="right" width="9%" style="font-weight: bold;">Precio</th>
                <th align="right" width="9%" style="font-weight: bold;">Dscto.</th>
                <th align="right" width="9%" style="font-weight: bold;">Precio Total</th>
            </tr>';
        }
        $html .= '</thead>
<tbody>
<!-- ITEMS HERE -->';

        for ($i = 1; $i <= count($fuente['codigo']); $i++) {
            if ($fuente['codigo'] === " ") {
                $html .= '<tr><td></td>';
                $html .= '<td>' . $fuente['descripcion'][$i] . '</td>';
            } else {
                if ($fuente['CustomField2'] === "CON ORDEN DE COMPRA") {
                    $html .= '<tr><td>' . $fuente['codigo'][$i] . '</td>';
                    $html .= '<td>' . $fuente['auxiliar'][$i] . '</td>';
                    $html .= '<td>' . $fuente['descripcion'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['cantidad_out'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['pUnitario_out'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['descuento'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['totalSinImpto_out'][$i] . '</td></tr>';
                } else {
                    $html .= '<tr><td>' . substr($fuente['descripcion'][$i], 0, 13) . '</td>';
                    $html .= '<td>' . substr($fuente['descripcion'][$i], 14) . '</td>';
                    $html .= '<td align="right">' . $fuente['cantidad_out'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['pUnitario_out'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['descuento'][$i] . '</td>';
                    $html .= '<td align="right">' . $fuente['totalSinImpto_out'][$i] . '</td></tr>';
                }
            }
        }

            $html .= '<!-- END ITEMS HERE -->
<tr>';
            if ($fuente['CustomField2'] === "CON ORDEN DE COMPRA") {
                $html .= '<td class="blanktotal" colspan="5" rowspan="6">';
            } else {
                $html .= '<td class="blanktotal" colspan="4" rowspan="6">';
            }
            $html .= '<span align="center">Informacion Adicional</span>';
            $html .= '<p>TEL : ' . $fuente['CustomField11'] . '</p>
            <p>EMAIL : ' . $fuente['CustomField12'] . '</p>
            <p>RUTA : ' . $fuente['CustomField1'] . '</p>
            <p>ASESOR : ' . $fuente['SalesRepRef_FullName'] . '</p>';
            if ($fuente['CustomField2'] === "CON ORDEN DE COMPRA") {
                $html .= '<p>ORDEN DE COMPRA : ' . $fuente['Memo'] . '</p></td>';
            } else {
                $html .= '<p>OBSERVACIONES : ' . $fuente['Memo'] . '</p>
            </td>';
            }

            $html .= '<td class="totals" align="right">Subtotal 12% :</td>
<td class="totals" align="right">';
            if ($fuente['codigoPorcentajeFact'] === '2') {
                $html .= $fuente['baseImponibleFact'];
            } else {
                $html .= '0.00';
            }
            $html .= '</td>
</tr>
<tr>
<td class="totals" align="right">Subtotal 0% :</td>
<td class="totals" align="right">0.00</td>
</tr>
<tr>
<td class="totals" align="right">Sin Impuestos :</td>
<td class="totals" align="right">';
            if ($fuente['codigoPorcentajeFact'] === '6') {
                $html .= $fuente['baseImponibleFact'];
            } else {
                $html .= '0.00';
            }
            $html .= '</td>
</tr>
<tr>
<td class="totals" align="right"><b>IVA 12% :</b></td>
<td class="totals" align="right"><b>';

            $html .= $fuente['valorFact'] . '</b></td>
</tr>
<tr>
<td class="totals" align="right">Descuentos :</td>
<td class="totals" align="right">0.00</td>
</tr>
<tr>
<td class="totals" align="right"><b>Importe Total:</b></td>
<td class="totals" align="right"><b>';

            $html .= $fuente['importeTotal'] . '</b></td>
</tr>
</tbody>
</table>
</body>
</html>
';

            $this->session->set('html', $html);
            $mpdf = new \Mpdf\Mpdf([
               'margin_left' => 4,
               'margin_right' => 3,
               'margin_top' => 8,
               'margin_bottom' => 5,
               'margin_header' => 1,
               'margin_footer' => 1
            ]);

            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle("Los Coqueiros - Factura");
            $mpdf->SetAuthor("Los Coqueiros");
            $mpdf->SetWatermarkText("");
            if ($fuente['CustomField15'] === "AUTORIZADO") {
                $mpdf->SetWatermarkText("Autorizada");
            }

            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'DejaVuSansCondensed';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            $mpdf->WriteHTML($html);

            if ($condicion == 1) {
                $mpdf->Output();
            } else {
                $firmado = $a['elpdf'];
                $mpdf->Output($firmado, 'F');
            }
        }

        function llenaFactura() {

            $a = $this->session->get('archivos');
            $firmado = $a['firmado'];
            $w_cabecera = $this->session->get('cabecera');
            $ruc = $this->session->get('contribuyente');
            $doc1 = new DOMDocument();
            $doc1->load($firmado);

            $fuente['ciudad'] = $w_cabecera['BillAddress_City'];
            $stringDate = strtotime($w_cabecera['fechaPago']);
            $dateString = date('d/m/Y', $stringDate);
            $fuente['fechaPago'] = $dateString;
            $fuente['CustomField1'] = $w_cabecera['CustomField1'];
            $fuente['CustomField2'] = $w_cabecera['CustomField2'];
            $fuente['CustomField9'] = $w_cabecera['CustomField9'];
            $fuente['CustomField11'] = $w_cabecera['CustomField11'];
            $fuente['CustomField12'] = $w_cabecera['CustomField12'];
            $fuente['SalesRepRef_FullName'] = $w_cabecera['SalesRepRef_FullName'];
            $fuente['Memo'] = $w_cabecera['Memo'];
            $fuente['TermsRef_FullName'] = $w_cabecera['TermsRef_FullName'];
            if ($w_cabecera['CustomField13'] <> "") {
                $fuente['CustomField13'] = $w_cabecera['CustomField13'];
                $fuente['CustomField14'] = $w_cabecera['CustomField14'];
            } else {
                $fuente['CustomField13'] = $this->session->get('fechaAutorizacion');
                $fuente['CustomField14'] = $this->session->get('numeroAutorizacion');
            }
            $fuente['CustomField15'] = $w_cabecera['CustomField15'];
            $fuente['ambiente'] = $doc1->getElementsByTagName('ambiente')->item(0)->nodeValue;
            $fuente['tipoEmision'] = $doc1->getElementsByTagName('tipoEmision')->item(0)->nodeValue;
            $fuente['razonSocial'] = $doc1->getElementsByTagName('razonSocial')->item(0)->nodeValue;
            $fuente['nombreComercial'] = $doc1->getElementsByTagName('nombreComercial')->item(0)->nodeValue;
            $fuente['ruc'] = $doc1->getElementsByTagName('ruc')->item(0)->nodeValue;
            $fuente['claveAcceso'] = $doc1->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
            $fuente['codDOc'] = $doc1->getElementsByTagName('codDoc')->item(0)->nodeValue;
            $fuente['estab'] = $doc1->getElementsByTagName('estab')->item(0)->nodeValue;
            $fuente['ptoEmi'] = $doc1->getElementsByTagName('ptoEmi')->item(0)->nodeValue;
            $fuente['secuencial'] = $doc1->getElementsByTagName('secuencial')->item(0)->nodeValue;
            $fuente['dirMatriz'] = $doc1->getElementsByTagName('dirMatriz')->item(0)->nodeValue;
            $fuente['fechaEmision'] = $doc1->getElementsByTagName('fechaEmision')->item(0)->nodeValue;
            $fuente['dirEstablecimiento'] = $doc1->getElementsByTagName('dirEstablecimiento')->item(0)->nodeValue;
            $fuente['obligado'] = $doc1->getElementsByTagName('obligadoContabilidad')->item(0)->nodeValue;
            $fuente['tipoId'] = $doc1->getElementsByTagName('tipoIdentificacionComprador')->item(0)->nodeValue;
            $fuente['razonSocialComprador'] = $doc1->getElementsByTagName('razonSocialComprador')->item(0)->nodeValue;
            $fuente['idComprador'] = $doc1->getElementsByTagName('identificacionComprador')->item(0)->nodeValue;
            $fuente['totalSinImpuestos'] = $doc1->getElementsByTagName('totalSinImpuestos')->item(0)->nodeValue;
            $fuente['totalDescuento'] = $doc1->getElementsByTagName('totalDescuento')->item(0)->nodeValue;
            $fuente['codigoIFact'] = $doc1->getElementsByTagName('codigo')->item(0)->nodeValue;
            $fuente['codigoPorcentajeFact'] = $doc1->getElementsByTagName('codigoPorcentaje')->item(0)->nodeValue;
            $fuente['baseImponibleFact'] = $doc1->getElementsByTagName('baseImponible')->item(0)->nodeValue;
            $fuente['valorFact'] = $doc1->getElementsByTagName('valor')->item(0)->nodeValue;
            $fuente['propina'] = $doc1->getElementsByTagName('propina')->item(0)->nodeValue;
            $fuente['importeTotal'] = $doc1->getElementsByTagName('importeTotal')->item(0)->nodeValue;

            $fuente['subtotal12'] = 0;
            $Tag_product = $doc1->getElementsByTagName('detalle');
            $lineas = 0;
            $fuente['subtotal12_out'] = number_format($fuente['subtotal12'], 2, ',', '.');

            $Tag_product = $doc1->getElementsByTagName('detalle');
            $lineas = 0;
            foreach ($Tag_product as $producto) {
                $lineas++;
                if ($producto->hasChildNodes()) {
                    foreach ($producto->childNodes as $child) {
                        switch ($child->nodeName) {
                            case 'codigoPrincipal':
                                $fuente['codigo'][$lineas] = $child->nodeValue;
                                break;
                            case 'codigoAuxiliar':
                                $fuente['auxiliar'][$lineas] = $child->nodeValue;
                                break;
                            case 'descripcion':
                                $fuente['descripcion'][$lineas] = $child->nodeValue;
                                break;
                            case 'cantidad':
                                $wk_cantidad = $child->nodeValue;
                                $fuente['cantidad_out'][$lineas] = number_format($wk_cantidad, 2, ',', '.');
                                break;
                            case 'precioUnitario':
                                $wk_pUnitario = $child->nodeValue;
                                $fuente['pUnitario_out'][$lineas] = number_format($wk_pUnitario, 2, ',', '.');
                                break;
                            case 'descuento':
                                $fuente['descuento'][$lineas] = $child->nodeValue;
                                break;
                            case 'precioTotalSinImpuesto':
                                $wk_totalSinImpto = $child->nodeValue;
                                $fuente['totalSinImpto_out'][$lineas] = number_format($wk_totalSinImpto, 2, ',', '.');
                                $fuente['subtotal12'] = $fuente['subtotal12'] + $wk_totalSinImpto;
                                break;
                        }
                    }
                }
            }

            $this->session->set('fuente', $fuente);
        }

    }
    