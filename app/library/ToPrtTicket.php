<?php

use Phalcon\Mvc\User\Component as componente;

class ToPrtTicket extends componente {

    function imprimeTicket($condition) {

        $pago = $this->session->get('pago');
        $contribuyente = $this->session->get('contribuyente');
        $ticket = $this->session->get('ticket');
        $parametros = array('conditions' => 'IDKEY = ?1', 'bind' => array(1 => $ticket->TxnID));
        $ticketline = Aticketline::find($parametros);
        $cliente = Customer::findFirstByListID($pago['CustomerRef_ListID']);
        if ($cliente == false) {
            $this->flash->error("Este cliente no existe " . $pago['CustomerRef_ListID']);
            return $this->dispatcher->forward(
                  [
                     "controller" => "customer",
                     "action" => "index",
                  ]
            );
        }
        $html = '
<html>
<head>
<style>
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
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

.barcode {
    padding: 1.5mm;
    margin: 0;
    vertical-align: top;
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

<table width="25%"><tr>
<td width="98%" style="color:#0000BB;" >
<img width="60" height="50" src="https://carrillosteam.com/public/img/logo.jpg"><br />
</td></tr><tr>
<td class="izq">
<p color="#A52A2A"><strong>';
        $html .= $contribuyente['razon'] . '</strong></p>
<p color="#A52A2A"><strong>';
        $html .= $contribuyente['NombreComercial'] . '</strong></p>
<p color="#A52A2A"><strong></strong><span color="#B8860B">';
        $html .= $contribuyente['DirMatriz'] . '</span></p></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong></strong></span><span color="#B8860B">';

        $html .= $contribuyente['ruc'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Nro. Ticket: </strong></span><span color="#B8860B">';

        $html .= $ticket->RefNumber . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Cliente : </strong></span><span color="#B8860B">';

        $html .= $pago['CustomerRef_FullName'] . '</span></td></tr><tr>
<td class="derch"><span color="#A52A2A"><strong>Fecha : </strong></span><span color="#B8860B">';

        $html .= date('F j, Y', strtotime($pago['TxnDate'])) . '</span></td>
</tr>
</table>

<br />

<table class="items" width="25%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2">
<thead>
<tr>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';
        foreach ($ticketline as $producto) {
            $html .= '<tr><td>' . $producto->ItemRefFullName . '</td>';
            $html .= '<td align="right">' . number_format($producto->Price, 2, ',', '.') . '</td></tr><tr>';
            $html .= '<td align="right">' . number_format($producto->Qty, 2, ',', '.') . '</td>';
            $html .= '<td align="right">' . number_format($producto->SubTotal, 2, ',', '.') . '</td></tr>';
        }

        $html .= '<!-- END ITEMS HERE -->
<tr>
<td class="totals" align="right">Subtotal 12% :</td>
<td class="totals" align="right">';

        $html .= number_format($ticket->SubTotal, 2, ',', '.') . '</td>
</tr>
<tr>
<td class="totals" align="right"><b>IVA 12% :</b></td>
<td class="totals" align="right"><b>';
        $html .= number_format($ticket->Iva, 2, ',', '.') . '</b></td>
</tr>
<tr>
<td class="totals" align="right"><b>Importe Total:</b></td>
<td class="totals" align="right"><b>';

        $html .= number_format($ticket->SubTotal + $ticket->Iva, 2, ',', '.') . '</b></td>
</tr>
</tbody>
</table>
</body>
</html>
';

        $this->session->set('html', $html);
//        $myfile = fopen('pedidos.html', 'w');
//        fwrite($myfile, $html);
        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 8,
           'margin_bottom' => 5,
           'margin_header' => 1,
           'margin_footer' => 1,
           'orientation' => 'L'
        ]);
//        fclose($myfile);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Ticket");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetWatermarkText("");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);
        if ($condicion == 1) {
            $filename = 'ticket' . trim($ticket->RefNumber) . '.pdf';
            $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
        } else {
            $filename = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/pedidos/ticket' . trim($ticket->RefNumber) . '.pdf';
            $mpdf->Output($filename, 'F');
        }
    }


}
