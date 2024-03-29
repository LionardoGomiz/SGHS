<?php 
	require_once('../lib/pdf/mpdf.php');

	$conn = new mysqli('localhost', 'root', '', 'db');
	$query = "SELECT * FROM productos";
	$prepare = $conn->prepare($query);
	$prepare->execute();
	$resultSet = $prepare->get_result();
	while($productos[] = $resultSet->fetch_array());
	$resultSet->Close();
	$prepare->Close();
	$conn->Close();




	$html = ' <header class="clearfix">
      <div id="logo">
        <img src="img/logo.png">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>++
          </tr>
        </thead>
        <tbody>';

        foreach ($productos as $producto) {
        	$html .= '<tr>
		            <td class="service">' .$producto['nombre']. '</td>
		            <td class="desc">' .$producto['descripcion']. '</td>
		            <td class="unit">' .$producto['precio']. '</td>
		            <td class="qty">' .$producto['cantidad']. '</td>
		            <td class="total">' . ($producto['precio']*$producto['cantidad']). '</td>
		          </tr>';
       
        }




        $html .=  '
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>';

	$mpdf = new mPDF('c', 'A4-l');
	$css = file_get_contents('css/style.css');
	$mpdf->writeHTML($css, 1);
	$mpdf->writeHTML($html);
	$mpdf->Output('reporte.pdf', 'I');
 ?>