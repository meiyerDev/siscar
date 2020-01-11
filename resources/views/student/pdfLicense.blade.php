<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UNERG - Carnet Estudiantil</title>
</head>
<body>
	<div style="border: 1px solid black; width: 350px;">
      <img src="{{ $student->photo_license_2 }}" style="margin-top: 30px;margin-left: 10px;"id="student_photo" width="330" height="215">
      <div style="border-top: 1px solid black; display: block;padding:10px 70px;">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(190)->generate($url)) !!} ">
      </div>
    </div>
	<p>Este es su carnet Estudiantil, por favor imprimir</p>
</body>
</html>