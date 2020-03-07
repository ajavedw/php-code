<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form id="form" action="process.php" method="post">

<input type="text" name="name" plaseholder="name..."><br><br>
<input type="text" name="email" plaseholder="email..."><br><br>
<textarea name="message" id="" cols="30" rows="10"></textarea><br>
<input type="submit" name="submit-ajax">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(function () {
$('#form').submit(function (e) {

var that = $(this),
    url =  that.attr('action'),
    method = that.attr('method'),
    data = {};

    that.find('[name]').each( function (indexInArray, valueOfElement) {
        var that = $(this),
        name = that.attr('name'),
        valueOfElement = that.val();
        data[name] = valueOfElement;
    });

    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: "dataType",
        success: function (response) {
            console.log(response);

        }
    });



    return false;


});
});
</script>
</body>
</html>