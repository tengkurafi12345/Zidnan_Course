<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidnan Course - @yield('title', 'App')</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- custom css link  -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/FE/style.css') }}">
</head>

<body>
    <!-- Navigation Bar -->
    @include('layouts.navigation')

    <!-- Konten Utama -->
    @yield('content')

    {{-- Pop Up  whatsapp Todo: Ini hanya opsi --}}
    {{-- <div class="widget HTML" data-version="1" id="HTML10"><br />
        <div class="widget-content"><br />
            <div style="bottom: 0; display: scroll; position: fixed; right: 0;"><a
                    href="https://wa.me/628113301109?text=Assalamualaikum%20Bunda%20Aqiqah." target="_blank"><img
                        border="0" height="56"
                        src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgJdRjYOJuOkjfDFm5xMpnO8xo8GFn9tXy5cJ9967TrXktE9ZYJDSnTs9RIkGv40m6wvyS79tNhRRFqUzUmuFl0sJ0v-d-77ee3qmtR7bruBqCgz2KcKeOm-BIf8mcQIp08ZolPikU5Lq_K/s320/Logo-Whatsapp.png"
                        width="180" / /></a></div><br />
        </div><br />
        <div class="clear"></div><br /><span class="widget-item-control"><br /><span
                class="item-control blog-admin"><br /><a class="quickedit"
                    href="https://www.blogger.com/rearrange?blogID=5583676110771538268&amp;widgetType=HTML&amp;widgetId=HTML10&amp;action=editWidget&amp;sectionId=sidebar2"
                    onclick="return _WidgetManager._PopupConfig(document.getElementById(&quot;HTML10&quot;));"
                    rel="nofollow" target="configHTML10" title="Edit"><br /><img alt="" height="18"
                        src="https://resources.blogblog.com/img/icon18_wrench_allbkg.png" width="18"
                        / /><br /></a><br /></span><br /></span><br />
        <div class="clear"></div><br />
    </div> --}}
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Zidnan Bimbel. All rights reserved.</p>
    </footer>

    <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        // Mendapatkan semua elemen alert dengan close button
        var closeBtns = document.getElementsByClassName("closebtn");

        // Menambahkan event listener pada setiap close button
        for (var i = 0; i < closeBtns.length; i++) {
            closeBtns[i].onclick = function() {
                var alert = this.parentElement;
                alert.style.display = "none"; // Menyembunyikan alert saat tanda silang diklik
            }
        }
    </script>
</body>

</html>
