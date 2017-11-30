<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitores extends CI_Controller { // a classe sempre deve estar em letra maiúscula

	public function index()
	{
	
		// The location of the PDF file on the server.
		$filename = "application/views/pdf/OrientaMonitor.pdf";
		// Let the browser know that a PDF file is coming.
		header("Content-type: application/pdf");
		header("Content-Length: " . filesize($filename));
		// Send the file to the browser.
		readfile($filename);
	}

}
