<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body style="width: 100%;">
    
    <h1>Welcome</h1>

    <div id="list">
        <div id="user-data" ></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <script>
        // setInterval(() => {
        //     getUser();
        // }, 3000);

        function getUser() {
            $.ajax({
                url: '{{ route('user') }}',
                type: 'GET',
                dataType: 'json',
                cache: false,
                success: function(response) {
                    len = response['data'].length;
                    for(var i = 0; i < len; i++) {
                        // $('#user-data').remove();
                        let$('#user-data').append(`
                            <p>`+response['data'][i].name+`</p>
                            <p>`+response['data'][i].email+`</p>
                        `);
                        // $('#user-data').html(response['data'][i].name);
                        // console.log(response);
                    }
                }
            });
        }

    </script>
    </body>
    
</html>