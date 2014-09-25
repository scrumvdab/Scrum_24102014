<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('activiteiten', [
    'as' => 'activiteiten',
    'uses' => 'ActiviteitenController@main'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'ContactController@main'
]);

Route::get('leden', [
    'as' => 'leden',
    'uses' => 'LedenController@main'
]);

Route::get('vrijwilligers', [
    'as' => 'vrijwilligers',
    'uses' => 'VrijwilligersController@main'
]);

Route::get('forum', [
    'as' => 'forum',
    'uses' => 'ForumController@main'
]);

Route::get('giften', [
    'as' => 'giften',
    'uses' => 'GiftenController@main'
]);

Route::get('links', [
    'as' => 'links',
    'uses' => 'LinksController@main'
]);

//authentication
Route::controller('users', 'UsersController');

// active link
HTML::macro('clever_link', function($route, $text) {	
	if( Request::path() == $route ) {
		$active = "class = 'active'";
	}
	else {
		$active = '';
	}
 
  return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
});

//CreatePdf
//Show a PDF
/*Route::get('pdf', function() {
    $html = '<html><body>'
            . '<p>Test</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->show();
});
//Download a PDF
Route::get('/', function() {
    $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->download('my_pdf');
});
//Returns a PDF as a string
Route::get('/', function() {
    $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    $pdf = PDF::load($html, 'A4', 'portrait')->output();
});
//Multiple PDFs
for ($i = 1; $i <= 2; $i++) {
    $pdf = new \Thujohn\Pdf\Pdf();
    $content = $pdf->load(View::make('pdf.image'))->output();
    File::put(public_path('test' . $i . '.pdf'), $content);
}
PDF::clear();
//Examples
//Save the PDF to a file in a specific folder, and then mail it as attachement. By @w0rldart

define('BUDGETS_DIR', public_path('uploads/budgets')); // I define this in a constants.php file

if (!is_dir(BUDGETS_DIR)) {
    mkdir(BUDGETS_DIR, 0755, true);
}

$outputName = str_random(10); // str_random is a [Laravel helper](http://laravel.com/docs/helpers#strings)
$pdfPath = BUDGETS_DIR . '/' . $outputName . '.pdf';
File::put($pdfPath, PDF::load($view, 'A4', 'portrait')->output());

Mail::send('emails.pdf', $data, function($message) use ($pdfPath) {
    $message->from('us@example.com', 'Laravel');
    $message->to('you@example.com');
    $message->attach($pdfPath);
});
*/