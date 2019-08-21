<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
.pdfobject-container {width: 500px;height: 600px; }
</style>
</head>
<body>
	<div id="example1" class="pdfobject-container"></div>
	<script src="{{asset('public/pdfobject.js')}}"></script>
<script>PDFObject.embed("{{$url}}", "#example1");</script>
</body>
</html>