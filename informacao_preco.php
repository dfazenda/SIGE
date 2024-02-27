<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION)) {
        session_start();
    }

    // Include the TCPDF library
    require_once('pages/tcpdf/tcpdf.php');

    // Create a new TCPDF object and generate the PDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Matricula e mensalidades');
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    $html = "
    
    <p style='text-align: justify;'><h2 clss='text-warning'>Inscrições abertas para o ano lectivo 2024</h2>
    A tabela abaixo ilustra o valor da matricula e mensalidades por classe. A estadia normal corresponde ao periodo normal das aulas e a estadia completa corresponde ao periodo das aulas, explicação e refeições, e o valor das refeições de 2.800,00 mensal. Isto significa que para estadia completa paga-se o valor normal das mensalidades e o valor das refeições.<br>
    Todos alunos da estadia completa entram de manhã. Os que têm aulas no periodo da manhã, passam a ter explicação a tarde, os que têm aulas no periodo da tarde, recebem explicação no periodo da manhã.
    Para turno há um explicador para cada ciclo. Isto é, de 1ª a 6ª há um explicador; de 7ª a 10ª há um explicador e da 11ª a 12ª há um explicador.<br>
    </p>
        <table style='border: 1px solid grey;'>
            <thead style='border: 1px solid red;'>
                <tr style='border: 1px solid grey;'>
                 <th >Classe</th>
                 <th >Matricula</th>
                 <th >Mensalidade(Estadia normal)</th>
                 <th >Mensalidade(Estadia completa)</th>                               
                                                      
                </tr>
            </thead>
            <tbody style='border: 1px solid grey;'>  
                <tr>
                    <td>1ª</td><td>1.260,00</td><td>4.550,00</td><td>7.350,00</td>
                </tr>
                <tr>
                    <td>2ª</td><td>1.260,00</td><td>4.550,00</td><td>7.350,00</td>
                </tr>
                <tr>
                    <td>3ª</td><td>1.260,00</td><td>4.550,00</td><td>7.350,00</td>
                </tr>
                <tr>
                   <td>4ª</td><td>1.260,00</td><td>4.550,00</td><td>7.350,00</td>
                </tr>
                <tr>
                     <td>5ª</td><td>1.785,00</td><td>5.000,00</td><td>7.800,00</td>
                </tr>
                <tr>
                    <td>6ª</td><td>1.785,00</td><td>5.500,00</td><td>7.800,00</td>
                </tr>
                <tr>
                    <td>7ª</td><td>1.785,00</td><td>5.500,00</td><td>8.300,00</td>
                </tr>
                <tr>
                    <td>8ª</td><td>3.675,00</td><td>7.000,00</td><td>9.800,00</td>
                </tr>
                <tr>
                   <td>9ª</td><td>3.675,00</td><td>7.000,00</td><td>9.800,00</td>
                </tr>
                 <tr>
                    <td>10ª</td><td>3.675,00</td><td>7.000,00</td><td>9.800,00</td>
                </tr>
                <tr>
                    <td>11ª</td><td>3.850,00</td><td>7.500,00</td><td>10.300,00</td>
                </tr>
                <tr>
                    <td>12ª</td><td>3.850,00</td><td>7.500,00</td><td>10.300,00</td>
                </tr>
                                                                                                    
            </tbody>
        </table>
        <p>
        O pagamento das mensalidades é de 11 prestações, que correspode de Fevereiro a Dezembro.<br>
        Pagamento por depósito ou transferência para Conta Bancária:<br>
        Nº <b>55405237</b> - Millennium Bim<br>
        Titula: <b>Colégio Ilia</b><br>
        </p>

    <br>
    ";

    $pdf->writeHTML($html, true, 0, true, 0);

    // Output the PDF to the browser
    $pdf->Output('generated_pdf.pdf', 'I');
}
?>

                                                
