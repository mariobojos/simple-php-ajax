<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="This is a PHP/JS AJAX demo by Mario Ronel Ferdinand Bojos (c) 2020">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">   
</head>
<body>
    <div class="container-fluid">
        <h1>A PHP/JS AJAX demonstration:</h1>
        <br>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h4>Data loaded from a PHP array</h4>
                    <ul class="list-group" id="listahan"></ul>
                </div>
                <div class="col-6 id="details"">
                    <h5>Click the info icon from the left to load details (fetching data using AJAX) here:</h5>
                    <div id="details"></div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- External JS sources -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Our JS code starts here -->
    <script>
        $(function() {

            // This will be called after the web page has been loaded
            $.ajax({
                type : "POST",
                data: {},
                dataType: "json",
                url: "ajax_load.php"
            }).done(function (result) {
                if (result.length > 0) {
                    for (key in result) {
                        let myHtml = "<li class='list-group-item'>" + 
                            result[key].name + 
                            '<span class="fa fa-info fa-fw" style="cursor:pointer;" onclick="showDetails(' + key + ')"></span>' +
                            "</li>";
                        $("#listahan").append(myHtml);
                    }
                }
            });
        });

        // This will be called when the user clicks the 'info' icon
        function showDetails(id) {
            $.ajax({
                type : "POST",
                data: { index: id },
                dataType: "json",
                url: "ajax_load.php"
            }).done(function (result) {
                if (typeof result === 'object') {
                    console.log(result);
                    let myHtml = '' +
                        '<ol>' +
                        '<li>Name: ' + result.name + '</li>' +
                        '<li>Age: ' + result.age + '</li>' +
                        '<li>Gender: ' + result.gender + '</li>' +
                        '</ol>' ;
                    
                    $("#details").empty().append(myHtml);
                }
            });
        }


    </script>
</body>
</html>