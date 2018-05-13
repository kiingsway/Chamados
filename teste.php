<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<select id="sel" class="select">
  <option value='1'>One</option>
  <option value='2'>Two</option>
  <option value='3' selected>Three</option>
</select>

<script>
	document.querySelector('.select').addEventListener('change',function(){
	    alert('changed');
	});


</script>
</body>
</html>