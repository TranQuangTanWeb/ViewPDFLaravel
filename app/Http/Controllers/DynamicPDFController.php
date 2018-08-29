<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class DynamicPDFController extends Controller
{
	function index(){
		return view('dynamic_pdf');
	}

	function pdf()
	{
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->convert_customer_data_to_html());
		return $pdf->stream();
	}

	function convert_customer_data_to_html()
	{
		$output = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
			<div class="container">
				<h2>Bordered Table</h2>
				<p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
				<a href="" class="btn btn-danger" target="blank">Convert into PDF</a>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>John</td>
									<td>Doe</td>
									<td>john@example.com</td>
								</tr>
								<tr>
									<td>Mary</td>
									<td>Moe</td>
									<td>mary@example.com</td>
								</tr>
								<tr>
									<td>July</td>
									<td>Dooley</td>
									<td>july@example.com</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>';
		return $output;
	}
}
