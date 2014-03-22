<style type="text/css">
body {
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:13px;
color:#333
margin:0;
background-color: #4ea5cd;
}

#wrapper {
width:1000px;
margin:0 auto;
}

#header {
float:left;
height:75px;
width:990px;
background: #F5F5F5;
border:solid 5px #ccc;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright:75px;
-moz-border-radius-bottomleft:5px;
-moz-border-radius-bottomright:5px;
-webkit-border-top-left-radius:5px;
-webkit-border-top-right-radius:75px;
-webkit-border-bottom-left-radius:5px;
-webkit-border-bottom-right-radius:5px;
border-top-left-radius:5px;
border-top-right-radius:75px;
border-bottom-left-radius:5px;
border-bottom-right-radius:5px;
margin-bottom: 5px;
}

#content {
float:left;
background:#FFF;
width:570px;
border:solid 5px #ccc;
margin: 0 5px 5px 5px;
}

#content p {padding: 7px;margin: 0;}
#content h2 {padding: 7px;margin: 0;}

#leftcolumn {
background: #F5F5F5;
width:200px;
float:left;
border:solid 5px #ccc;
margin-bottom: 5px;
}

#leftcolumn ol li {list-style: none; margin-left: -25px;}
#leftcolumn ul li {list-style: square; margin-left: -40px;}

#rightcolumn {
background: #F5F5F5;
width:190px;
float:left;
border:solid 5px #ccc;
margin-bottom: 5px;
}

#rightcolumn ol li {list-style: none; margin-left: -25px;}
#rightcolumn ul li {list-style: square; margin-left: -40px;}

#footer {
float:left;
height:30px;
width:990px;
background: #F5F5F5;
border:solid 5px #ccc;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright:5px;
-moz-border-radius-bottomleft:5px;
-moz-border-radius-bottomright:75px;
-webkit-border-top-left-radius:5px;
-webkit-border-top-right-radius:5px;
-webkit-border-bottom-left-radius:5px;
-webkit-border-bottom-right-radius:75px;
border-top-left-radius:5px;
border-top-right-radius:5px;
border-bottom-left-radius:5px;
border-bottom-right-radius:75px;
margin-bottom: 5px;
clear: both;
}

#footer p {padding: 7px;margin: 0;}

table.plain {margin: 4px; width: 562px;}
table.alt {margin: 4px; width: 562px;}
table.alt tr:nth-child(odd) {background-color: #ccc;}
table.alt th {background-color: #fff;padding-left:5px}
table.alt td {padding-left:3px}
table.alt tr:nth-child(even) {background-color: #aaa;}

input.edit {border: 0; border-bottom: 2px dashed #cdcdcd; padding-left: 3px;}

.error{font-weight:700;color:#000; padding: 5px; border: 2px solid #000; background-color: #B5E3FF;}
.logo{float:left;margin:5px}

.message {
		-webkit-background-size: 40px 40px;
		-moz-background-size: 40px 40px;
		background-size: 40px 40px;			
		background-image: -webkit-gradient(linear, left top, right bottom,
								color-stop(.25, rgba(255, 255, 255, .05)), color-stop(.25, transparent),
								color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .05)),
								color-stop(.75, rgba(255, 255, 255, .05)), color-stop(.75, transparent),
								to(transparent));
		background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -moz-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -ms-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: -o-linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
		background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
							transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
							transparent 75%, transparent);
								
		 -moz-box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 -webkit-box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);		
		 box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
		 width: 100%;
		 border: 1px solid;
		 color: #fff;
		 padding: 15px;
		 position: fixed;
		 _position: absolute;
		 text-shadow: 0 1px 0 rgba(0,0,0,.5);
		 -webkit-animation: animate-bg 10s linear infinite;
		 -moz-animation: animate-bg 10s linear infinite;
         margin-left:-410px;
}

.info {background-color: #4ea5cd; border-color: #3b8eb5;}

.error {background-color: #de4343; border-color: #c43d3d;}
		 
.warning {background-color: #eaaf51; border-color: #d99a36;}

.success {background-color: #61b832; border-color: #55a12c;}

.message h3 {margin: 0 0 5px 0;	text-align: center;}

.message p {margin: 0;	text-align: center;}

@-webkit-keyframes animate-bg {
    from {background-position: 0 0;}
    to {background-position: -80px 0;}
}

@-moz-keyframes animate-bg {
    from {background-position: 0 0;}
    to {background-position: -80px 0;}
}
</style>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo $site_url?>inc/sources/js/messagebox.js"></script>

<script type="text/javascript" src="<?php echo $site_url?>inc/sources/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink link image lists pagebreak",
                "code media nonbreaking paste"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect",
        toolbar2: "bullist numlist | blockquote | undo redo | link unlink image media code",

        menubar: false,
        statusbar: false,
        toolbar_items_size: 'small'

});</script>