<?php
global $poporealestate_default_options;

?>
<header>
    <div class="header" id="home">
        <div class="banner-header">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active wow fadeInDown" data-wow-delay="300ms">
                        <div id="home-banner-image">
                        <img src="<?php
                        if(get_theme_mod('poporealestate_home_banner_background_image',$poporealestate_default_options['poporealestate_home_banner_background_image'])=="")
                        {
                            echo $poporealestate_default_options['poporealestate_home_banner_background_image'];
                        }
                        else
                        {
                            echo get_theme_mod('poporealestate_home_banner_background_image',$poporealestate_default_options['poporealestate_home_banner_background_image']);
                        } ?>"
                                                                                        alt="banner"/>
                        </div>

                        <div class="carousel-caption">
                            <div class="container">
                                <div class="caption-box">
                                    <h1 class="wow fadeInLeft" data-wow-delay="1000ms"><?php echo get_theme_mod('poporealestate_home_banner_title', $poporealestate_default_options['poporealestate_home_banner_title']); ?></h1>

                                    <form method="get" action="<?php echo get_theme_mod('poporealestate_search_page'); ?>"
                                    ">
                                    <div class="advance-search-section">
                                        <div class="advance-search">
                                            <div class="select-option2">
                                                <div class="multilang wow fadeInDown" data-wow-delay="900ms">
                                                    <select class="selectpicker" name="status">
                                                        <option value="any">Status</option>
                                                        <?php poporealestate_select_property_statuses(""); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-option">
                                                <input id="poporealestate-home-search-box" autocomplete="off" type="text" name="location" class="form-control" placeholder="<?php echo __("Location","poporealestate"); ?>"/>
                                                <i>X</i>
                                                <ul class="dropdown-menu" id="poporealestate-search-dropdown-menu">

<!--                                                    <li><a href="javascript:;">Mazyr Ipsum </a></li>-->
<!--                                                    <li><a href="javascript:;"><span>Mami</span> Beach</a></li>-->
<!--                                                    <li><a href="javascript:;">Mexico</a></li>-->
<!--                                                    <li><a href="javascript:;">Meihekou</a></li>-->
                                                </ul>
                                            </div>
                                            <div class="select-option2">
                                                <div class="multilang wow fadeInDown" data-wow-delay="900ms">
                                                    <select class="selectpicker" name="beds">
                                                        <option value="any">Bedrooms</option>
                                                        <?php poporealestate_get_min_beds(""); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="select-option3 brnone">
                                                <div class="multilang wow fadeInDown" data-wow-delay="900ms">
                                                    <select class="selectpicker" name="type">
                                                        <option value="any">Type</option>
                                                        <?php poporealestate_select_property_types(""); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="button-option">
                                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls-->
            </div>
        </div>
    </div>
</header>