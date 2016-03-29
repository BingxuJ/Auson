<?php
/**
 * 
 * Athena - Team Member Single Template
 * Last Updated: Feb 8th, 2016
 * Current version of the plugin : 3.0.0
 * 
 * 
 */

get_header();

$options = get_option('smartcat_team_options') ? get_option('smartcat_team_options') : null;
$plugin = null;

if(class_exists( 'SmartcatTeamPlugin' ) ) :
    $plugin = new SmartcatTeamPlugin();
endif;

?>
<div class="sc-single-wrapper">

    <?php while (have_posts()) : the_post(); ?>
        <div class="sc_team_single_member <?php echo $options['single_template']; ?>">

            <div class="sc_single_side" itemscope itemtype="http://schema.org/Person">

                <div class="inner">
                    <?php echo the_post_thumbnail('medium'); ?>
                    <h2 class="name" itemprop="name"><?php echo the_title(); ?></h2>
                    <h3 class="title" itemprop="jobtitle"><?php echo get_post_meta(get_the_ID(), 'team_member_title', true); ?></h3>
                    <ul class="social <?php echo 'yes' == $options['social'] ? '' : 'hidden'; ?>">

                        <?php $plugin->set_social(get_the_ID()); ?>

                    </ul>
                </div>
            </div>

            <div class="sc_single_main">  

                <?php echo the_content(); ?>

            </div>

        </div>

    <?php endwhile; ?>
</div>
<?php get_footer(); ?>