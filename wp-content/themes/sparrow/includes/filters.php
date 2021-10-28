<?php
add_filter( 'intermediate_image_sizes', function ( $sizes ){
 
    $sizes = array_diff($sizes, [
        'medium',
        'medium_large',
        'large',
        '1536x1536',
        '2048x2048',
    ]);

 return $sizes;
});

add_filter( 'intermediate_image_sizes_advanced', function($sizes) {

    $type = get_post_type( $_REQUEST['post_id'] );

    foreach( $sizes as $key => $value ){

        if( $type == 'portfolio_projects' ) {

            if( $key == 'blog_thumb' ){ 
                unset( $sizes[ $key ] );
            } else if($key == 'team_thumb') {
                unset($sizes[$key]);
            }

        } else if($type == 'post') {

            if( $key == 'portfolio_thumb' ){ 
                unset( $sizes[ $key ] );
            } else if($key == 'porfolio_mediumthumb') {
                unset($sizes[$key]);
            } else if($key == 'team_thumb') {
                unset($sizes[$key]);
            }

        } else {

            if($key == 'portfolio_thumb'){ 
                unset( $sizes[ $key ] );
            } else if($key == 'porfolio_mediumthumb') {
                unset($sizes[$key]);
            } else if($key == 'blog_thumb') {
                unset($sizes[$key]);
            }
            
        }
    }
    // $json = json_encode($sizes);
    // $file = fopen(__DIR__ . '/debug.json', 'w+');
    // fwrite($file, $json);
    // fclose($file);
    return $sizes;
} );

function search_form_no_filters() {
    // look for local searchform template
    $search_form_template = locate_template( 'searchform.php' );
    if ( '' !== $search_form_template ) {
      // searchform.php exists, remove all filters
      remove_all_filters('get_search_form');
    }
  }
  add_action('pre_get_search_form', 'search_form_no_filters');

// add_filter( 'get_search_form', function ( $form ) {

// 	$form = '
// 	<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
// 		<label class="screen-reader-text" for="s">Запрос для поиска:</label>
// 		<input type="text" value="' . get_search_query() . '" name="s" id="s" />
// 		<input type="submit" id="searchsubmit" value="Найти" />
// 	</form>';

//     $form = '
//     <div class="widget widget_search">
//         <form id="searchform" method="get" role="search" action="' . home_url('/blog/') .'">
//             <input class="text-search" type="text" onfocus="" placeholder="Search here..." value="' . get_search_query() . '">
//             <input type="submit" class="submit-search" value="">
//         </form>
//     </div>';

//     return $form;
// } );

?>