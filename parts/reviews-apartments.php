<?php
if(!function_exists('af_booking')) {
	return;
}

// Get all approved comments
$comments_query = new WP_Comment_Query;
$comments       = $comments_query->query([
	'post_id' => get_the_ID(),
	'status'  => 'approve',
	'number'  => 100,
	'orderby' => 'comment_date_gmt',
	'order'   => 'DESC',
]);

// Separate replies
$replies = [];

if($comments) {
	foreach($comments as $k => $comment) {
		if($comment->comment_parent != 0) {
			$replies[ $comment->comment_parent ][] = $comment;
			unset($comments[ $k ]);
		}
	}
}

$countries = af_booking()->getCountries();

// Loop
?>

<?php if($comments): ?>

	<?php
	foreach($comments as $comment):

		$key = 'comment_' . $comment->comment_ID;

		$subject      = get_field('subject', $key);
		$date         = get_field('date', $key);
		$country      = get_field('country', $key);
		$rating       = get_field('rating', $key);
		$rating_empty = 5 - $rating;

		$cflag = sprintf('%s/dist/images/flags/%s.png', get_stylesheet_directory_uri(), $country);
		$cname = $countries[ $country ];
		?>

        <div class="commentHolder">
            <div class="row">
                <div class="col-md-2">
                    <div class="commentLeftHolder">
                        <div class="commentFlagHolder">
                            <img src="<?php echo $cflag; ?>" alt="<?php echo esc_attr($cname); ?>"
                                 title="<?php echo esc_attr($cname); ?>">
                        </div><!--/.commentFlagHolder-->
                        <div class="commentNameHolder">
                            <p><?php echo esc_html($comment->comment_author); ?></p>
                        </div><!--/.commentNameHolder-->
                        <div class="commentDateHolder">
                            <span><?php echo esc_html($date); ?></span>
                        </div><!--/.commentDateHolder-->
                    </div><!--/.commentLeftHolder-->
                </div><!--/.col-md-2-->
                <div class="col-md-10">
                    <div class="commentMainHolder">
                        <div class="commentCaption">
                            <h3><?php echo esc_html($subject); ?></h3>
                        </div><!--/.commentCaption-->
                        <div class="commentRating">
							<?php echo str_repeat('<span class="Rating__Star__Display filled"></span>', $rating); ?>
							<?php echo str_repeat('<span class="Rating__Star__Display"></span>', $rating_empty); ?>
                        </div><!--/.commentRating-->
                        <div class="commentContent">
							<?php echo wpautop($comment->comment_content); ?>
                        </div><!--/.commentContent-->
						<?php if(isset($replies[ $comment->comment_ID ])): ?>
							<?php foreach($replies[ $comment->comment_ID ] as $reply): ?>
                                <div class="commentReply">
                                    <p class="author"><?php echo esc_html($reply->comment_author); ?></p>
									<?php echo wpautop($reply->comment_content); ?>
                                </div><!--/.commentReply-->
							<?php endforeach; ?>
						<?php endif; ?>
                    </div><!--/.commentMainHolder-->
                </div><!--/.col-md-10-->
            </div><!--/.row-->
        </div><!--/.commentHolder-->

	<?php endforeach; ?>

<?php else: ?>

    <p>Za sada nema utisaka za ovaj apartman</p>

<?php endif; ?>
