<?php
add_action( 'add_meta_boxes', 'cpt_add_custom_box' );
function cpt_add_custom_box() 
{    
    add_meta_box( 
        'cpt_meta_box',
        'Custom Meta Box',
        'cpt_meta_box_callback',
        'cpt_post_type' ,
        'normal',
        "high"
    );
}

add_action( 'save_post', 'cpt_save_postdata' );
function cpt_save_postdata($post_id) 
{   
    // verify if this is an auto save routine
    // If it is our form has not been submitted, so we dont want to do anything
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // verify this came from the our screen and with proper authorization
    // because save_post can be triggered at other times
    $_POST['cpt_noncename'] = isset($_POST['cpt_noncename']) ? $_POST['cpt_noncename'] : '';
    if(!wp_verify_nonce( $_POST['cpt_noncename'], plugin_basename( __FILE__ ))) return;

    // Check permissions
    if(isset($_POST['post_type']))
    {
        if('page' == $_POST['post_type']) 
        {
            if(! current_user_can('edit_page', $post_id)) return;
        }
        else
        {
            if(! current_user_can('edit_post', $post_id)) return;
        }   
    }
    
    // update_post_meta($post_id,'cpt_meta_box',$post_meta);
    update_post_meta($post_id,'cpt_input_text',$_POST['cpt_input_text']);
    update_post_meta($post_id,'cpt_input_select',$_POST['cpt_input_select']);
    update_post_meta($post_id,'cpt_input_checkbox_1',$_POST['cpt_input_checkbox_1']);
    update_post_meta($post_id,'cpt_input_checkbox_2',$_POST['cpt_input_checkbox_2']);
    update_post_meta($post_id,'cpt_input_checkbox_3',$_POST['cpt_input_checkbox_3']);
    update_post_meta($post_id,'cpt_input_radio',$_POST['cpt_input_radio']);
    update_post_meta($post_id,'cpt_input_textarea',$_POST['cpt_input_textarea']);
}

/** 
 * Prints the box content 
 */
function cpt_meta_box_callback( $post ) 
{
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_noncename' );

    $cpt_input_text = get_post_meta($post->ID, 'cpt_input_text',true);
    $cpt_input_select = get_post_meta($post->ID, 'cpt_input_select',true);
    $cpt_input_checkbox_1 = get_post_meta($post->ID, 'cpt_input_checkbox_1',true);
    $cpt_input_checkbox_2 = get_post_meta($post->ID, 'cpt_input_checkbox_2',true);
    $cpt_input_checkbox_3 = get_post_meta($post->ID, 'cpt_input_checkbox_3',true);
    $cpt_input_radio = get_post_meta($post->ID, 'cpt_input_radio',true);
    $cpt_input_textarea = get_post_meta($post->ID, 'cpt_input_textarea',true);

    ?>

    <style type="text/css">
        #cpt_meta_box .inside {
            margin: 0;
            padding: 0;
        }
        #cpt_meta_box .inside > table {
                margin-top: 0;
        }
        #cpt_meta_box .inside > table tr + tr {
            border-top: #EEEEEE solid 1px;
        }
        #cpt_meta_box .inside > table th {
            padding: 20px 10px 20px 15px;
            background: #F9F9F9;
            border-right: #EEEEEE solid 1px;
            width: 175px;
            font-weight: normal;
        }
        #cpt_meta_box input[type='text'], 
        #cpt_meta_box select, 
        #cpt_meta_box textarea {
            width: 100%;
        }
        #cpt_meta_box textarea {
            height: 100px;
        }
    </style>

    <table class="form-table">
        <tr>
            <th>Date Time</th>
            <td><input type="text" name="cpt_input_text" value="<?php echo $cpt_input_text ?>"></td>
        </tr>
        <tr>
            <th>Location</th>
            <td><input type="text" name="cpt_input_select" value="<?php echo $cpt_input_select ?>">
            </td>
        </tr>
        <tr>
            <th>Url</th>
            <td>
               <input type="text" name="cpt_input_textarea" value="<?php echo $cpt_input_textarea ?>">
            </td>
        </tr>
        
        
    </table>
<?php 

}