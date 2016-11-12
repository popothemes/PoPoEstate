<?php

function realtor_css()
{
    $css="";

    $css=$css.'.testimonial-image{background:url('.get_template_directory_uri().'/images/testimonial.png) no-repeat left bottom;padding:50px 0 150px 356px;}';
    $css=$css.'.address-button i,.call-button i{background:'.realtor_get_primary_color().';}';
    list($r, $g, $b) = sscanf(realtor_get_primary_color(), "#%02x%02x%02x");
    $css=$css.'.advance-search-section{background:'."rgba($r,$g,$b,0.7);}";
    $css=$css.'.search-sec input:focus{background:'.realtor_get_primary_color().';}';
    return $css;

}
