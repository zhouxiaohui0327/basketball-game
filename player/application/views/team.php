<!DOCTYPE html>
<html>
<head>
    <title>

</title>
<style>

body {
    width: 600px;
    margin: 40px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 14px;
    color: #444;
}

table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
    border-radius: 0 0 6px 6px
}
 
/* button 
---------------------------------------------- */
.button {
    display: inline-block;
    zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */
    *display: inline;
    vertical-align: baseline;
    margin: 0 2px;
    outline: none;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font: 14px/100% Arial, Helvetica, sans-serif;
    padding: .5em 2em .55em;
    text-shadow: 0 1px 1px rgba(0,0,0,.3);
    -webkit-border-radius: .5em; 
    -moz-border-radius: .5em;
    border-radius: .5em;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
    box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.button:hover {
    text-decoration: none;
}
.button:active {
    position: relative;
    top: 1px;
}

.bigrounded {
    -webkit-border-radius: 2em;
    -moz-border-radius: 2em;
    border-radius: 2em;
}
.medium {
    font-size: 12px;
    padding: .4em 1.5em .42em;
}
.small {
    font-size: 11px;
    padding: .2em 1em .275em;
}

/* color styles 
---------------------------------------------- */

/* black */
.black {
    color: #d7d7d7;
    border: solid 1px #333;
    background: #333;
    background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));
    background: -moz-linear-gradient(top,  #666,  #000);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#666666', endColorstr='#000000');
}
.black:hover {
    background: #000;
    background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
    background: -moz-linear-gradient(top,  #444,  #000);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#000000');
}
.black:active {
    color: #666;
    background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
    background: -moz-linear-gradient(top,  #000,  #444);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#666666');
}

/* gray */
.gray {
    color: #e9e9e9;
    border: solid 1px #555;
    background: #6e6e6e;
    background: -webkit-gradient(linear, left top, left bottom, from(#888), to(#575757));
    background: -moz-linear-gradient(top,  #888,  #575757);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#888888', endColorstr='#575757');
}
.gray:hover {
    background: #616161;
    background: -webkit-gradient(linear, left top, left bottom, from(#757575), to(#4b4b4b));
    background: -moz-linear-gradient(top,  #757575,  #4b4b4b);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#757575', endColorstr='#4b4b4b');
}
.gray:active {
    color: #afafaf;
    background: -webkit-gradient(linear, left top, left bottom, from(#575757), to(#888));
    background: -moz-linear-gradient(top,  #575757,  #888);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#575757', endColorstr='#888888');
}

/* white */
.white {
    color: #606060;
    border: solid 1px #b7b7b7;
    background: #fff;
    background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
    background: -moz-linear-gradient(top,  #fff,  #ededed);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed');
}
.white:hover {
    background: #ededed;
    background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dcdcdc));
    background: -moz-linear-gradient(top,  #fff,  #dcdcdc);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dcdcdc');
}
.white:active {
    color: #999;
    background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#fff));
    background: -moz-linear-gradient(top,  #ededed,  #fff);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#ffffff');
}

/* orange */
.orange {
    color: #fef4e9;
    border: solid 1px #da7c0c;
    background: #f78d1d;
    background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
    background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
}
.orange:hover {
    background: #f47c20;
    background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
    background: -moz-linear-gradient(top,  #f88e11,  #f06015);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
}
.orange:active {
    color: #fcd3a5;
    background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
    background: -moz-linear-gradient(top,  #f47a20,  #faa51a);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f47a20', endColorstr='#faa51a');
}

/* red */
.red {
    color: #faddde;
    border: solid 1px #980c10;
    background: #d81b21;
    background: -webkit-gradient(linear, left top, left bottom, from(#ed1c24), to(#aa1317));
    background: -moz-linear-gradient(top,  #ed1c24,  #aa1317);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ed1c24', endColorstr='#aa1317');
}
.red:hover {
    background: #b61318;
    background: -webkit-gradient(linear, left top, left bottom, from(#c9151b), to(#a11115));
    background: -moz-linear-gradient(top,  #c9151b,  #a11115);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#c9151b', endColorstr='#a11115');
}
.red:active {
    color: #de898c;
    background: -webkit-gradient(linear, left top, left bottom, from(#aa1317), to(#ed1c24));
    background: -moz-linear-gradient(top,  #aa1317,  #ed1c24);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#aa1317', endColorstr='#ed1c24');
}

/* blue */
.blue {
    color: #d9eef7;
    border: solid 1px #0076a3;
    background: #0095cd;
    background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
    background: -moz-linear-gradient(top,  #00adee,  #0078a5);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#00adee', endColorstr='#0078a5');
}
.blue:hover {
    background: #007ead;
    background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
    background: -moz-linear-gradient(top,  #0095cc,  #00678e);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#0095cc', endColorstr='#00678e');
}
.blue:active {
    color: #80bed6;
    background: -webkit-gradient(linear, left top, left bottom, from(#0078a5), to(#00adee));
    background: -moz-linear-gradient(top,  #0078a5,  #00adee);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#0078a5', endColorstr='#00adee');
}

/* rosy */
.rosy {
    color: #fae7e9;
    border: solid 1px #b73948;
    background: #da5867;
    background: -webkit-gradient(linear, left top, left bottom, from(#f16c7c), to(#bf404f));
    background: -moz-linear-gradient(top,  #f16c7c,  #bf404f);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f16c7c', endColorstr='#bf404f');
}
.rosy:hover {
    background: #ba4b58;
    background: -webkit-gradient(linear, left top, left bottom, from(#cf5d6a), to(#a53845));
    background: -moz-linear-gradient(top,  #cf5d6a,  #a53845);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#cf5d6a', endColorstr='#a53845');
}
.rosy:active {
    color: #dca4ab;
    background: -webkit-gradient(linear, left top, left bottom, from(#bf404f), to(#f16c7c));
    background: -moz-linear-gradient(top,  #bf404f,  #f16c7c);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#bf404f', endColorstr='#f16c7c');
}

/* green */
.green {
    color: #e8f0de;
    border: solid 1px #538312;
    background: #64991e;
    background: -webkit-gradient(linear, left top, left bottom, from(#7db72f), to(#4e7d0e));
    background: -moz-linear-gradient(top,  #7db72f,  #4e7d0e);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#7db72f', endColorstr='#4e7d0e');
}
.green:hover {
    background: #538018;
    background: -webkit-gradient(linear, left top, left bottom, from(#6b9d28), to(#436b0c));
    background: -moz-linear-gradient(top,  #6b9d28,  #436b0c);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#6b9d28', endColorstr='#436b0c');
}

.green:active {
    color: #a9c08c;
    background: -webkit-gradient(linear, left top, left bottom, from(#4e7d0e), to(#7db72f));
    background: -moz-linear-gradient(top,  #4e7d0e,  #7db72f);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#4e7d0e', endColorstr='#7db72f');
}

/* pink */
.pink {
    color: #feeef5;
    border: solid 1px #d2729e;
    background: #f895c2;
    background: -webkit-gradient(linear, left top, left bottom, from(#feb1d3), to(#f171ab));
    background: -moz-linear-gradient(top,  #feb1d3,  #f171ab);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#feb1d3', endColorstr='#f171ab');
}
.pink:hover {
    background: #d57ea5;
    background: -webkit-gradient(linear, left top, left bottom, from(#f4aacb), to(#e86ca4));
    background: -moz-linear-gradient(top,  #f4aacb,  #e86ca4);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f4aacb', endColorstr='#e86ca4');
}
.pink:active {
    color: #f3c3d9;
    background: -webkit-gradient(linear, left top, left bottom, from(#f171ab), to(#feb1d3));
    background: -moz-linear-gradient(top,  #f171ab,  #feb1d3);
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f171ab', endColorstr='#feb1d3');
}
 
</style>
</head>

<body>


</h2>
<h2 align="center"></h2>
<table class="zebra">
    <thead>
    <tr>
        <th>类别</th>        
        <th>姓名</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td>&nbsp;</td>        
        <td></td>
        <td></td>
    </tr>
    </tfoot> 
            <?php if($team){?>
        <?php foreach ($team as $item) {?> 
        <form role="form" action="../../player/player/<?php echo $item->player_id?>"  method="post" >  
    <tr>
        <td><?php echo $item->player_type?></td>        
        <td><?php echo $item->player_name?></td>
        
      <td align="right"> <button type="submit" class="button white medium">个人资料</button></td>

    </tr>   
</form>
    <?php }}?>       
    
</table>
<br>
    

</body>
</html>
