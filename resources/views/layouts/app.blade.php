<!DOCTYPE html>
<html>
<head>
	<title>E2E Department</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-8"><br>
					  @include('inc.emptyfielderror')
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
