<?php
/*
Template Name: Work
*/
get_header(); ?>
<div class="grid-x grid-padding-x fluid">
    <div class="cell small-12 medium-12">
        <table id="work" class="work tablesorter">
            <thead>
                <tr>
                    <th id="wdate">Date <span class="arrowup hide">&uarr;</span><span class="arrowdown">&darr;</span></th>
                    <th id="wname">Name</th>
                    <th id="wtype">Type <span class="arrowup hide">&uarr;</span><span class="arrowdown">&darr;</span></th>
                </tr>
            </thead>
            <?php 
            $args = array(
                'post_type' => 'am_projects',
                'posts_per_page' => 10,
                'meta_key' => 'year',
                'orderby' => 'meta_value',
                'order'	=> 'DESC'
            );
            $works = new WP_Query( $args ); ?>
            <tbody>
                <?php while ( $works->have_posts() ): $works->the_post();
                $date = get_field('year');
                $tags = get_the_terms($post->ID,'project_types');
                ?>
                <tr>
                <td><?php echo $date; ?></td>
                <td><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></td>
                <td><?php foreach ($tags as $tag) { echo $tag->name; } ?></td>
                </tr>
                <?php endwhile; wp_reset_postdata(); ?>  
            </tbody>
        
        </table>
    </div>
    
</div>
<?php get_footer();
