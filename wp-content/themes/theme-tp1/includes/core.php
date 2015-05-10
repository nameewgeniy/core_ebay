<?php
        // id terns
        function ghost_id($id)
        {
            $terms = get_the_terms($id, 'catproducts');
            foreach($terms as $term) {
                if($term->count >= 1) {
                    $output_id = $term->term_id;
                    break;
                }
            }
            return $output_id;
        }

        function b2_get_post($type, $args = array())
        {
            global $wpdb;
            $options = array_merge(array(
                'paged' => 1,
                'posts_per_page' => -1,
            ), $args);
            $sql = "SELECT wt.term_id as term_id, wt.name as name, wt.slug as slug, wtt.taxonomy as taxonomy, wtt.count as count FROM {$wpdb->terms} as wt LEFT JOIN {$wpdb->term_taxonomy} as wtt ON wtt.term_id = wt.term_id";
            $param = array();
            $limit = '';
            if($type) {
                $param[] = 'wtt.taxonomy = "' . $type . '"';
            }
            if($options['posts_per_page'] > 1) {
                $paged     = 0;
                $max_count = b2_get_count_post($type, $options['exclude']);
                $max       = ceil($max_count / $options['posts_per_page']);
                if($options['paged'] > 1 && $max >= $options['paged']) {
                    $paged = ($options['paged'] - 1) * $options['posts_per_page'];
                } elseif($options['paged'] > 1 && $max <= $options['paged']) {
                    $paged = ($max - 1) * $options['posts_per_page'];
                }
                $limit = ' LIMIT ' . $paged . ',' . $options['posts_per_page'];
            }
            $sql .= ' WHERE ' . implode(' AND ', $param) . $limit;
            return $wpdb->get_results( $sql );
        }
        function b2_get_count_post($type)
        {
            global $wpdb;
            $sql = "SELECT COUNT(*) FROM {$wpdb->term_taxonomy} ";
            $param = array();
            if($type) {
                $param[] = 'taxonomy = "' . $type . '"';
            }
            $sql .= 'WHERE ' . implode(' AND ', $param);
            if($count = $wpdb->get_var( $sql )) {
                return $count;
            }
            return 0;
        }
        function ghost_categories()
        {
            $args = array(
                'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                'posts_per_page' => 100,
            );
            $type = 'catproducts';
            $terms    = b2_get_post( $type, $args );
            if($terms) {
                return $terms;
            }

            return array();
        }

        function b2_pagination($max)
        {
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'  => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total'   => $max
            ) );
        }
?>