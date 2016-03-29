<?php
/*
 * Short description
 * @author bilal hassan <info@smartcatdesign.net>
 * 
 */
?>

    <?php if (!dynamic_sidebar('sidebar-header-right')) : ?>
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search ..." value="" name="s" title="Search for:" />
            </label>
            <!--<input type="submit" class="search-submit" value="Search" />-->
        </form>
    <?php endif; // end sidebar widget area  ?>
