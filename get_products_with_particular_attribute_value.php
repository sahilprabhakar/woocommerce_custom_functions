<?php
/**
 * Get Product IDs based on attribute values
 * @author Sahil Prabhakar
 * @version 1.1.0
 */


 /**
  * Defining the function
  * Replace [SLUG_OF_ATTRIBUTE1] with actual slug of the attribute you want to compare with.
  * Replace [SLUG_OF_ATTRIBUTE2] with actual slug of the attribute you want to compare with.
  * While comparing the values %d is used if your value is a number and %s if your value is string.
  */
 function SaP_getProductID($attr1_value, $attr2_value) {
     global $wpdb;
     $args = $wpdb->prepare("
        SELECT meta1.post_id
        FROM {$wpdb->prefix}postmeta meta1
        INNER JOIN {$wpdb->prefix}postmeta meta2 ON meta1.post_id = meta2.post_id
        WHERE meta1.meta_key = 'attribute_pa_[SLUG_OF_THE_ATTRIBUTE1]'
        AND meta1.meta_value = %d or %s
        AND meta2.meta_key = 'attribute_pa_[SLUG_OF_THE_ATTRIBUTE2]'
        AND meta2.meta_value = %d or %s 
     ", $attr1_value, $attr2_value);
     $results = $wpdb->get_results($args);
     if (!$results) {
         return false;
     }
     else {
        return $results;
     }
 }

 