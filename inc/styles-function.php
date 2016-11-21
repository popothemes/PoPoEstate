<?php

function realtor_css()
{
    global $realtor_default_options;
    $css="";

    $css=$css.'.testimonial-image{background:url('.get_theme_mod('realtor_home_testimonials_image',$realtor_default_options['realtor_home_testimonial_image']).') no-repeat left bottom;padding:50px 0 150px 356px;}';
    $css=$css.'.address-button i,.call-button i{background:'.realtor_get_primary_color().';}';
    list($r, $g, $b) = sscanf(realtor_get_primary_color(), "#%02x%02x%02x");
    $css=$css.'.advance-search-section{background:'."rgba($r,$g,$b,0.7);}";
    $css=$css.'.search-sec input:focus{background:'.realtor_get_primary_color().';}';
    $css=$css.'blockquote {
    padding: 20px 20px 20px 60px;
    background: url('.get_template_directory_uri().'/images/quote.png) no-repeat 20px 30px #24b898;
    margin: 30px 0 30px 30px;
    color: #fff;}';

    return $css;

}
