<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOPPOOL</title>
    {{-- css --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{ asset("/storage/css/decorate.css") }}">

    {{-- fonts     --}}
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">

    {{-- favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/pictures/favicon.png') }}">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


</head>
<body>
    @include('layouts.menu')

    <div style="font-family: 'Bai Jamjuree', sans-serif; margin-top:74px;">
        @yield("content")
    </div>

    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        // ไว้กำหนดปุ่มติ้ก ในหน้า cart

        $(".checkAll1").click(function() {
            $(".check1").prop('checked', $(this).prop('checked'));
        });

        $("#checkAll").click(function() {
            $(".checkAll1").prop('checked', $(this).prop('checked'));
            $(".check1").prop('checked', $(this).prop('checked'));
        });


        // ไว้ กำหนดค่า + -จำนวนสินค้า
        $(document).on('click', '.number-spinner button', function() {
            var btn = $(this)
                , oldValue = btn.closest('.number-spinner').find('input').val().trim()
                , newVal = 0;

            if (btn.attr('data-dir') == 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });

    </script>

</body>
</html>
