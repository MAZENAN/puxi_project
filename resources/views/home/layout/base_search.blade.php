<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/home/favicon.ico" type="image/x-icon" />
    @yield('headerlink')
    @yield('style')
</head>
<body>
@yield('main')
<script src="/home/js/jquery-3.3.1.js"></script>
<script>
    function search(){
        var searchText=$("input[name='key']").val()
        searchText = searchText.replace(/[\/]+/g,'')
        searchText = searchText.trim()
        if(searchText.length==0){
            alert("输入的内容不能为空");
            return;
        }
        /*跳转传值*/
        var searchUrl = '/search/' //使用encodeURI编码
        location.href = searchUrl+searchText;
    }
    $("#headerbtn").click(function (){
        search();
    })
    /*隐藏显示*/
    $(".us_img").click(function (){
        $(".contact_us").css("display","none")
    })
    $(".tougao").click(function(){
        $(".contact_us").css("display","block")
    })
</script>
@yield('js')
</body>
</html>