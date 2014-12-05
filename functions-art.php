<?php
//Create Art custom post type
add_action('init', 'create_art');
function create_art() {
	$art_args = array(
		'label' => __('Art'),
		'singular_label' => __('Art'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
	   );
	register_post_type('art',$art_args);
}
// Fix issue where custom post types don't show up on tag archive pages
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	$post_type = get_query_var('post_type');
	if($post_type)
		$post_type = $post_type;
	else
		$post_type = array('post','art');
	$query->set('post_type',$post_type);
	return $query;
	}
}
?><?php
//Create custom input field for Art custom post type
add_action("admin_init", "add_art");
add_action('save_post', 'update_art_custom');
function add_art(){
	add_meta_box("art_details", "Art Options", "art_options", "art", "side", "low");
}
function art_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	$print = $custom["print"][0];
	$year = $custom["year"][0];
	$medium = $custom["medium"][0];
?>
<div id="art-options">
	<p><label style="display:block;font-weight:bold">Print URL:</label><input name="print" value="<?php echo $print; ?>" style="border:1px solid #ccc" /></p>
	<p><label style="display:block;font-weight:bold">Year:</label><input name="year" value="<?php echo $year; ?>" style="border:1px solid #ccc" /></p>
	<p><label style="display:block;font-weight:bold">Medium:</label><input name="medium" value="<?php echo $medium; ?>" style="border:1px solid #ccc" /></p>
</div><!--end art-options-->   
<?php
}
function update_art_custom(){
	global $post;
	update_post_meta($post->ID, "print", $_POST["print"]);
	update_post_meta($post->ID, "year", $_POST["year"]);
	update_post_meta($post->ID, "medium", $_POST["medium"]);
}
?><?php
//Customize Art custom post type dashboard columns
add_filter("manage_edit-art_columns", "art_edit_columns");
function art_edit_columns($art_columns){
	$art_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"medium" => "Medium",
		"year" => "Year",
		"tags" => "Tags",
		"date" => "Publish status",
	);
	return $art_columns;
}
add_action('manage_posts_custom_column', 'art_custom_column_content');
function art_custom_column_content( $column ){
	global $post;
	if( $post->post_type != 'art' ) return;
	if( $column == 'medium' )
		echo get_post_meta( $post->ID, 'medium', true );
	if( $column == 'year' )
		echo get_post_meta( $post->ID, 'year', true );
}
?>