
Conversation opened. 1 read message.

Skip to content
Using Gmail with screen readers
in:sent 
1 of 41
(no subject)
Inbox

Manu U <umanu5266@gmail.com>
16:36 (0 minutes ago)
to me

each others comments

function restrict_comments( $comments , $post_id ){ 
global $post;
$user = wp_get_current_user();
if($post->post_author == $user->ID){
        return $comments;
}
foreach($comments as $comment){
    if(  $comment->user_id == $user->ID || $post->post_author == $comment->user_id  ){
        if($post->post_author == $comment->user_id){
            if($comment->comment_parent > 0){
                $parent_comm = get_comment( $comment->comment_parent );
                if( $parent_comm->user_id == $user->ID ){
                    $new_comments_array[] = $comment;       
                }
            }else{
                    $new_comments_array[] = $comment;   
            }
        }else{
            $new_comments_array[] = $comment;           
        }
    }
}
 return $new_comments_array; }

add_filter( 'comments_array' , 'restrict_comments' , 10, 2 );
Only allow post author to reply to a comment

