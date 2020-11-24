<!DOCTYPE html>
<html>
<!-- <html lang="ar"> for arabic only -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Facture Client SANTA AGATA</title>
    <style>
        @media print {
            @page {
                margin: 0 auto;
                sheet-size: 300px 250mm;
            }
            html {
                direction: rtl;
            }
            html,body{margin:0;padding:0}
            #printContainer {
                width: 250px;
                margin: auto;
                /*padding: 10px;*/
                /*border: 2px dotted #000;*/
                text-align: justify;
            }

            /*span {
                display: inline-block;
                min-width: 350px;
                white-space: nowrap;
                background: red;
            }*/

            .text-center{text-align: center;}
        }
    </style>
</head>
<body onload="window.print();">
<h1 id="logo" class="text-center">InixCommercial</h1>

<div id='printContainer'>
    <h2 id="slogan" style="margin-top:0" class="text-center">SANTA AGATA</h2>
    <?php foreach ($receipt->result() as $row): ?>
    <table>
        <tr>
            <td>Numéro de reçu</td>
            <td><b>#59867</b></td>
        </tr>
        <tr>
            <td>Créé le</td>
            <td><b><?= date("d-m-Y H:i:s", time()); ?><br></b></td>
        </tr>

        <tr>
            <td>Client:</td>
            <td><b><?= $row->CLI_NOM.' '.$row->CLI_PRENOM ?></b></td>
        </tr>
    </table>
    <p class="text-center"><img src="<?= base_url() ?>site/qr.png" alt="QR-code" class="left"/></p>
    <hr>

    <table>
        <tr>
            <td><b>Article</b></td>
            <td><b>Prix</b></td>
            <td><b>Qté</b></td>
        </tr>
        <tr><td colspan="3"><hr></td></tr>
        <?php foreach ($ligne_commande->result() as $row1): ?>
        <tr>
            <td><b><?= $row1->CATEG_CODE ?></b></td>
            <td><b><?= $row1->LC_MONTANT ?></b></td>
            <td><b><?= $row1->LC_QUANTITE ?></b></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
        </tr>
    </table>
    <hr>

    <table>
        <tr>
            <td><b>Total</b></td>
            <td><b><?= $row->VEN_MONTANT_TOTAL ?></b></td>
        </tr>
        <tr>
            <td><b>Tot. Remise</b></td>
            <td><b><?= $row->VEN_REMISE ?></b></td>
        </tr>
        <tr>
            <td><b>Montant net</b></td>
            <td><b><?= $row->VEN_A_PAYER ?></b></td>
        </tr>
        <tr>
            <td><b>Tot. Payé </b></td>
            <td><b><?= $row->REG_MONTANT ?></b></td>
        </tr>
        <tr>
            <td><b>Tot. Restant</b></td>
            <td><b><?= $row->CLI_SOLDE ?></b></td>
        </tr>
    </table>
    <hr>
  <?php endforeach; ?>
</div>
</body>
</html>
