<?php

// Must be done for each controller
namespace App\Http\Controllers;

class PagesController extends Controller {

// Gets home page
	public function getIndex() {
		// This is what normally happens within these kinds of functions
		// process variable data or params
		// talk to the model
		// Recieve data from the model
		// compile or process data from the model if needed
		// pass that data to the correct view

		 return view('pages.welcome');
	}
// Get about page
	public function getAbout() {
		 $first = 'Matt';
		 $last = 'Chamberlain';

		 $fullname = $first . " " . $last;
		 $email = 'matthewwilliamchamberlain@gmail.com';
		 // Arrays can be passed into the view with the with method
		 $data = [];
		 // Assigning $email to 'email' key within the data array
		 $data['email'] = $email;
		 $data['fullname'] = $fullname;
		 // information is sent to the view via with method as the thing brackets
		 // Multiple variables can be added to the view with the with method
		 
		 // return view('pages.about')->withFullname($fullname)->withEmail($email);
		 return view('pages.about')->withData($data);
	}

	public function getContact() {
		 return view('pages/contact');
	}

}