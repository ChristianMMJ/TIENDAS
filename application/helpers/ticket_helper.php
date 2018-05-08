<?php
class TICKET extends FPDF { 
    function Footer() { 
        $this->SetFont('Arial', 'I', 5);
        $this->SetX(0);
        $this->Cell(75, 2, 'GRACIAS POR SU COMPRA', 0/* BORDE */, 1/* FILL */, 'C');
        $this->SetX(0);
        $this->Cell(75, 2, 'Pago en una sola exhibicion', 0/* BORDE */, 0/* FILL */, 'C');
        $this->SetX(12); 
    }

}