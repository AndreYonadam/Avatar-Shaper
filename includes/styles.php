<?php

function avatarshaper_styles(){
?>
<style type="text/css">
.avatar{
border-radius: none;
display: inline-block !important;
position: relative;
display: inline;
box-shadow: none !important;
padding: 0 !important;
border: 0 !important;
}
.settings-wrapper{
width: 510px;
float: left;
}
.avatar-padding{
margin-left: 5px;
margin-top: 5px;
}
.example-view{
width: 150px;
float: right;
}
.image-preview{
<?php
$shapeoption = get_option('shapeid', 1);
switch ($shapeoption){
case 1:
print '-webkit-border-radius: 15px !important;
-moz-border-radius: 15px !important;
border-radius: 15px !important;';
	break;
case 2:
print '-webkit-border-radius: 50% !important;
-moz-border-radius: 50% !important;
border-radius: 50% !important;';
	break;
case 3:
$radius = get_option('customslider', 50);
print '-webkit-border-radius: '. $radius .'% !important;
-moz-border-radius: '. $radius .'% !important;
border-radius: '. $radius .'% !important';
	break;
case 4:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/pentagon.svg#', __FILE__ ) . ');';
	break;
case 5:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/hexagon.svg#', __FILE__ ) . ');';
	break;
case 6:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/heptagon.svg#', __FILE__ ) . ');';
	break;
case 7:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/octagon.svg#', __FILE__ ) . ');';
	break;
case 8:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/nonagon.svg#', __FILE__ ) . ');';
	break;
case 9:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/diamond.svg#', __FILE__ ) . ');';
	break;
case 10:
print '
	-webkit-mask-box-image: url(' . plugins_url( '../img/heart.svg#', __FILE__ ) . ');';
	break;
case 11:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/burst.svg#', __FILE__ ) . ');';
	break;
}
if(get_option('shadowenable', 1) == 1 && get_option('shapeid', 1) <=3 && get_option('shapeid', 1) >= 1){
$shadowcolor = get_option('shadowcolor', '#ed8e00');
print "-webkit-box-shadow: 0px 0px 7px 3px ".$shadowcolor." !important;
-moz-box-shadow: 0px 0px 7px 3px ".$shadowcolor." !important;
box-shadow: 0px 0px 7px 3px ".$shadowcolor." !important;";
}
?>
}

.add-gloss{
position: absolute;
width: 100%;
height: 200%;
<?php
if(get_option('gloss', 1) == 1){
if(get_option('shapeid', 1) <= 3){
print 'background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255, 255, 255,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(255, 2555, 255, 1)));
background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255, 255, 255,1) 100%);
background: -o-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255, 255, 255,1) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255, 255, 255,1) 100%);
background: linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255, 255, 255,1) 100%);';
}
if(get_option('shapeid', 1) == 1){
print '-webkit-border-top-left-radius: 15px;
-webkit-border-top-right-radius: 15px;
-moz-border-radius-topleft: 15px;
-moz-border-radius-topright: 15px;
border-top-left-radius: 15px;
border-top-right-radius: 15px;';
}else if(get_option('shapeid', 1) == 2){
print "-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;";
}else if(get_option('shapeid', 1) == 3){
$customradius = get_option('customslider', 50);
print "-webkit-border-radius: ".$customradius."%;
-moz-border-radius: ".$customradius."%;
border-radius: ".$customradius."%;";
}else{
print "z-index: 999;
background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.2) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,0.2)));
/* background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.2) 100%); */
background: -o-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.2) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.2) 100%);
background: linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.2) 100%);
border-bottom-right-radius: 100px 30px;
border-bottom-left-radius: 100px 30px;
height: 55% !important;
width: 100% !important;";

}
}
?>
}
#normal{
border-top-right-radius: 30px;
border-top-left-radius: 30px;
border-bottom-right-radius: 100px 40px;
border-bottom-left-radius: 100px 40px;
}

#no-right{
border-top-right-radius: 30px;
border-top-left-radius: 30px;
border-bottom-left-radius: 360px 190px;
}
#no-left{
border-top-right-radius: 30px;
border-top-left-radius: 30px;
border-bottom-right-radius: 360px 190px;
}
#curve{
border-top-right-radius: 30px;
border-top-left-radius: 30px;
border-bottom-right-radius: 100px 40px;
border-bottom-left-radius: 100px 40px;
}
.image-preview{
z-index: 1;
position: absolute;
padding: 0 !important;
border: 0 !important;
left: auto !important;
top: auto !important;
}
.shadow-holder{
position: absolute !important;
background-position: center;
background-repeat: no-repeat;
background-size: 98% 98%;
width: 100%;
height: 100%;
<?php

if(get_option('shadowenable', 1) == 1){
$shapeidoption = get_option('shapeid', 1);
switch ($shapeidoption){
case 4:
print 'background-image: url(' . plugins_url( '../img/pentagon.svg#', __FILE__ ) . ');';
	break;
case 5:
print 'background-image: url(' . plugins_url( '../img/hexagon.svg#', __FILE__ ) . ');';
	break;
case 6:
print 'background-image: url(' . plugins_url( '../img/heptagon.svg#', __FILE__ ) . ');';
	break;
case 7:
print 'background-image: url(' . plugins_url( '../img/octagon.svg#', __FILE__ ) . ');';
	break;
case 8:
print 'background-image: url(' . plugins_url( '../img/nonagon.svg#', __FILE__ ) . ');';
	break;
case 9:
print 'background-image: url(' . plugins_url( '../img/diamond.svg#', __FILE__ ) . ');';
	break;
case 10:
print 'background-image: url(' . plugins_url( '../img/heart.svg#', __FILE__ ) . ');';
	break;
case 11:
print 'background-image: url(' . plugins_url( '../img/burst.svg#', __FILE__ ) . ');';
	break;
}

if($shapeidoption >= 4){
print '-webkit-filter: drop-shadow('.get_option('shadowcolor', '#ed8e00').' 0px 0px .8em);
-moz-filter: drop-shadow('.get_option('shadowcolor', '#ed8e00').' 0px 0px .8em);
-ms-filter: drop-shadow('.get_option('shadowcolor', '#ed8e00').' 0px 0px .8em);
-o-filter: drop-shadow('.get_option('shadowcolor', '#ed8e00').' 0px 0px .8em);
-ms-filter: "progid:DXImageTransform.Microsoft.Dropshadow(OffX=0, OffY=0, Color='.get_option('shadowcolor', '#ed8e00').')";
';
}
}
?>
}

.cut-gloss {
z-index: 1;
position: absolute !important;
<?php
if(get_option('gloss', 1) == 1){
$shapeoption = get_option('shapeid', 1);
if($shapeoption <= 3){
print 'width: 100%;
height: 50%;';}
else{
	print 'width: 100%;
	height: 100%;';
}
switch ($shapeoption){
case 1:
print 'overflow: hidden;';
	break;
case 2:
print 'overflow: hidden;';
	break;
case 3:
print 'overflow: hidden;';
	break;
case 4:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/pentagon.svg#', __FILE__ ) . ');';
	break;
case 5:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/hexagon.svg#', __FILE__ ) . ');';
	break;
case 6:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/heptagon.svg#', __FILE__ ) . ');';
	break;
case 7:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/octagon.svg#', __FILE__ ) . ');';
	break;
case 8:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/nonagon.svg#', __FILE__ ) . ');';
	break;
case 9:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/diamond.svg#', __FILE__ ) . ');';
	break;
case 10:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/heart.svg#', __FILE__ ) . ');';
	break;
case 11:
print '-webkit-mask-box-image: url(' . plugins_url( '../img/burst.svg#', __FILE__ ) . ');';
	break;
}
}
?>
}
canvas, img {
        image-rendering: -moz-crisp-edges;         /* Firefox */
        image-rendering:   -o-crisp-edges;         /* Opera */
        image-rendering: -webkit-optimize-contrast;/* Webkit (non-standard naming) */
        image-rendering: crisp-edges;
        -ms-interpolation-mode: nearest-neighbor;  /* IE (non-standard property) */
}
.width-gloss{
width: 100%;
height: 100%;
}
</style>
<?php } ?>