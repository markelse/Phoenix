<style type="text/css">
html,body,div,span,applet,object,iframe,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,fieldset,form,label,legend,h1,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}
body{line-height:1;background-color:#5c7c99;font:12px/18px Arial, sans-serif;width:100%;height:100%}
#menu ol, #menu il{list-style:none}
#menu li {list-style:none; margin-left: -15px;}
li.indent {list-style:square; margin-left: -35px;}
blockquote,q{quotes:none}
blockquote:before,blockquote:after,q:before,q:after{content:none}
table{border-collapse:collapse;border-spacing:0}
html{height:100%}
.wrapper{border-left:ridge 5px #000;border-right:ridge 5px #000;background-color:#FFF;width:950px;min-height:100%;height:auto!important;margin:0 auto}
.header{height:65px;background:#FFE680;padding:7px}
.middle{width:100%;position:relative;padding:0 0 100px}
.middle:after{display:table;clear:both;content:''}
.container{width:100%;float:left;overflow:hidden}
.content{padding:7px 7px 7px 277px}
.left-sidebar{float:left;width:250px;margin-left:-100%;position:relative;background:#B5E3FF;padding:7px}
.footer{width:934px;height:36px;background:#BFF08E;position:relative;margin:-50px auto 0;padding:7px}
h1{font-size:35px;padding:25px}
article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section,article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}

#edit input, #edit textarea {border:1px dashed #999; padding: 2px}

table.alt tr:nth-child(odd) {background-color: #ccc;}
table.alt th {background-color: #fff;}
table.alt tr:nth-child(even) {background-color: #aaa;}

.error{font-weight:700;color:#000; padding: 5px; border: 2px solid #000; background-color: #B5E3FF;}
.logo{float:left;margin:5px}
#regBox input,#loginBox input{border:2px solid #000;background-color:#e5edfa}
#regBox p,#loginBox p{color:#000;font-weight:700}

.message
{
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
		 -webkit-animation: animate-bg 5s linear infinite;
		 -moz-animation: animate-bg 5s linear infinite;
         margin-left:-510px;
}

.info
{
		 background-color: #4ea5cd;
		 border-color: #3b8eb5;
}

.error
{
		 background-color: #de4343;
		 border-color: #c43d3d;
}
		 
.warning
{
		 background-color: #eaaf51;
		 border-color: #d99a36;
}

.success
{
		 background-color: #61b832;
		 border-color: #55a12c;
}

.message h3
{
		 margin: 0 0 5px 0;	text-align: center;												 
}

.message p
{
		 margin: 0;	text-align: center;										 
}

@-webkit-keyframes animate-bg
{
    from {
        background-position: 0 0;
    }
    to {
       background-position: -80px 0;
    }
}


@-moz-keyframes animate-bg 
{
    from {
        background-position: 0 0;
    }
    to {
       background-position: -80px 0;
    }
}
</style>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    // This script is not my own
    // Copied from http://red-team-design.com/cool-notification-messages-with-css3-jquery/
var myMessages = ['info','warning','error','success']; // define the messages types      
function hideAllMessages()
{
     var messagesHeights = new Array(); // this array will store height for         each
     for (i=0; i<myMessages.length; i++)
     {
              messagesHeights[i] = $('.' + myMessages[i]).outerHeight();
              $('.' + myMessages[i]).css('top', -messagesHeights[i]); //move element outside viewport     
     }
}
function showMessage(type)
{

$('.'+ type +'-trigger').click(function(){
      hideAllMessages();                  
      $('.'+type).animate({top:"0"}, 500);
});
}
$(document).ready(function(){
     // Initially, hide them all
     hideAllMessages();
     // Show message
     for(var i=0;i<myMessages.length;i++)
     {
        showMessage(myMessages[i]);
     }
     // When message is clicked, hide it
     $('.message').click(function(){              
              $(this).animate({top: -$(this).outerHeight()}, 500);
      });
      setTimeout(function(){hideAllMessages()},4000);  
      
      var type="success";
      $('.'+type).animate({top:"0"}, 1000);
      var type="error";
      $('.'+type).animate({top:"0"}, 1000);
      var type="info";
      $('.'+type).animate({top:"0"}, 1000);
      var type="warning";
      $('.'+type).animate({top:"0"}, 1000);
		 
});       
</script>

<script type="text/javascript" src="<?php echo $site_url?>inc/sources/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink link image lists hr anchor pagebreak",
                "wordcount code fullscreen insertdatetime media nonbreaking",
                "paste"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
        toolbar2: "bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | fullscreen",

        menubar: false,
        toolbar_items_size: 'small'

});</script>