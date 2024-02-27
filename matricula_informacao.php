                         <?php
                            require_once('pages/tcpdf/tcpdf.php');  // Adjust the path to TCPDF library as needed

                            $q = isset($_GET['q']) ? $_GET['q'] : '';

                            ob_start(); // Start output buffering

                            if (isset($_GET['htmlContent'])) {
                                $htmlContent = urldecode($_GET['htmlContent']);

                                // Create a PDF instance with A4 page size
                                $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

                                // Set document information
                                $pdf->SetCreator('ILIA-ILIA');
                                $pdf->SetAuthor('Colegio Ilia');
                                $pdf->SetTitle('Informacao da matricula');

                                // Add a page
                                $pdf->AddPage();

                                // Set font
                                $pdf->SetFont('helvetica', '', 12);

                                // Output the HTML content as PDF
                                $pdf->writeHTML($htmlContent);

                                // Output as a download
                                $pdf->Output('matricula_informacao.pdf', 'D'); // 'D' indicates to force download
                            }

                            ob_end_flush(); // End output buffering

                            if (ob_get_length()) ob_end_clean(); // Clean any remaining output
                            ?>



                        
                       