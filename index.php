<?php 
ini_set('error_reporting', E_ERROR);
ini_set('display_errors', 1);
require 'vendor/autoload.php';

use Google\Cloud\Translate\V2\TranslateClient;
$result =[];
$translate = new TranslateClient([
    'key' => 'AIzaSyC7NGAgZ-Hg7uVbfFyy7zAYJxqa7G5rPBc'
]);

if (isset($_POST['textfromlang'])) {
	$result =$translate->translate($_POST['textfromlang'],['target'=>$_POST['selecttolang']]);
}

/*



 (سورة يوسف) ان ربي لطيف لما يشاء انه هو العليم الحكيم
korkma, sönmez bu şafaklarda yüzen al sancak (mehmet akif ersoy)
Sometimes you win, and sometimes you learn (John C. Maxwell)
L’école de la vie n’a point de vacances.


*/
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AI translate</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<form action="" method="POST">
				<div class="fromlang form-group">
				
					<div class="row border border-secondary">
						<div class="col-5  p-3 m-1">
							<select class="form-control" name="selectfromlang">
								<option value="en" selected>Otomatik dil tanıma</option>
							</select>
						</div>
						<div class="col-6 p-2">
							<textarea class="form-control" name="textfromlang"></textarea>
						</div>
					</div>
					
				</div>
				<div class="tolang form-group">
					
					<div class="row border border-secondary">
						<div class="col-5  p-3 m-1">
							<select class="form-control " name="selecttolang">
								<option value="en">English</option>
								<option value="tr">Türkçe</option>
								<option value="ar">عربي</option>
								<option value="fr">Française</option>
							</select>
						</div>
						<div class="col-6 p-2">
							<textarea class="form-control" name="texttolang" readonly><?php echo $result['text'] ?></textarea>
						</div>
					</div>
				
				</div>
				<button type="submit" class="btn btn-secondary m-3">Submit</button>
			</form>
		</div>
	</body>
</html>

