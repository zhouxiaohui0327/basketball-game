<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/11/26
 * Time: 14:55
 */
$id = $_GET['id']
?>

<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="<?php echo $id;?>" data-title="" data-url=""></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    var duoshuoQuery = {short_name:"zjoteam"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->
</body>
</html>