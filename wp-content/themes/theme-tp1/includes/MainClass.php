<?php 
/**
* 
*/
Class MainClass
{
	
	public function MoreContent($content = '', $length = 55)
	{
		if($content) {
			$words = explode(' ', $content, $length + 1);

			if(count($words) > $length) {

				array_pop($words);
				array_push($words, '...');
				$content = implode(' ', $words);

			}
			$content = $content;
		}
		return $content;
	}	

	public function ImgProductCat($term_id='')
	{
		$args = array(
	      'post_type'      => 'product',
	      'posts_per_page' => 20,
	      'orderby' => 'rand'
	    );
	    if( !empty($term_id) )
	    { 
	      $args = $args + array(
	        'tax_query' => array(
	          array(
	            'taxonomy' => 'productcat',
	            'field'    => 'id',
	            'terms'    => $term_id
	          )
	        )
	      );
	    }
	    $products = new Products;
	    $items  = $products->findAllByAttributes($args);
	    $id = array();
	    foreach ($items as $item) {
	    	$id[] = $item->getId();
	    }
	    if (!empty($id))
	    {
	    	$rand_id = array_rand($id,1);
	    	 $rand_product = $products->findById($id[$rand_id]);
   			 return $rand_product->getThumbnail();
	    }
	    
	    return false;
	   
	}
}	
	

