<?php
global $makani_options;
// Search Fields
$search_fields = $makani_options['makani_search_fields']['enabled'];
$search_page = $makani_options['makani_search_page'];
if ( ( 0 < count( $search_fields ) ) && ( !empty( $search_page ) ) ) {    ?>

<div class="site-search-module">
  <div class="container">
   <div class="row site-search-module-inside">  
                 
   <form class="advance-search-form" action="<?php echo get_permalink( $search_page ); ?>" method="get">
     <div class="form-group">
     
     
      <div class="col-md-4 no-padding">
           <button type="submit" class="btn btn-search">
              <i class="icon icon-Search"></i>البحث
          </button>
           <a href="#" id="ads-trigger" class="btn btn-advsearch">
              <i class="icon icon-FullScreen"></i> <span>بحث متقدم</span>
          </a>
      </div>  
      <div class="col-md-8 no-padding">  
    	 <?php
        foreach ($search_fields as $key => $val  ) { 
		switch( $key ) {
		
		case 'location': ?>
          <div class="col-md-4 no-padding">
             <div class="select-contanier">
                <select name="city" id="select-property-city" class="form-control c-select">
                <?php makani_generate_taxonomy_options( 'property-city', __( 'المدينة', 'makani' ) );?>
                </select>
            </div>
          </div>    
		<?php break; ?>
          
		<?php case 'status': ?>
          <div class="col-md-4 no-padding">       
               <div class="select-contanier">
                <select name="status" id="select-status" class="form-control c-select">
                <?php makani_generate_taxonomy_options( 'property-status', __( 'الغرض', 'makani' ) );?>
                </select>
           </div>
         </div>    
		<?php break; ?>
        
        <?php case 'type': ?>
		 <div class="col-md-4 no-padding">   
             <div class="select-contanier">
				<select name="type" id="select-property-type" class="form-control c-select ">
				  <?php makani_generate_taxonomy_options( 'property-type', __( 'الوحدات', 'makani' ) ); ?>
				</select>
            </div>
          </div>
		<?php break; ?>
        
        <?php case 'min-max-price': ?>
        <div class="col-md-4 no-padding">   
           <div class="select-contanier">
                <select name="min-price" id="select-min-price" class="form-control c-select">
                    <?php makani_minimum_prices_options(); ?>
                </select>
           </div>
        </div>    
        <div class="col-md-4 no-padding">      
           <div class="select-contanier">
                <select name="max-price" id="select-max-price" class="form-control c-select">
                    <?php makani_maximum_prices_options(); ?>
                </select>
           </div>
        </div>    
        <?php break; ?>
         
        <?php  case 'min-max-area': ?>
        <div class="col-md-4 no-padding"> 
        <div class="select-contanier">
         <input type="text" name="min-area" id="min-area" pattern="[0-9]+" value="<?php echo isset($_GET['min-area'])?$_GET['min-area']:''; ?>" placeholder="<?php _e('Min Area (sq ft)', 'makani'); ?>" title="<?php _e('Please only provide digits!','makani'); ?>"  class="form-control"/>
        </div>
        </div> 
       <div class="col-md-4 no-padding">  
        <div class="select-contanier">
        <input type="text" name="max-area" id="max-area" pattern="[0-9]+" value="<?php echo isset($_GET['max-area'])?$_GET['max-area']:''; ?>" placeholder="<?php _e('Max Area (sq ft)', 'makani'); ?>" title="<?php _e('Please only provide digits!','makani'); ?>" class="form-control" />
        </div>
       </div>  
       <?php break; ?>
                     
                      
       <?php case 'min-beds': ?>
            <div class="col-md-4 no-padding">
				<div class="select-contanier">
				<select name="bedrooms" id="select-bedrooms" class="form-control c-select">
					<?php makani_number_options( 'bedrooms', __( ' االاسرة', 'makani' ) ) ?>
				</select>
			 </div>
           </div>  
		<?php break;  ?>

		<?php case 'min-baths': ?>
           <div class="col-md-4 no-padding">    
               <div class="select-contanier">
                   <select name="bathrooms" id="select-bathrooms" class="form-control c-select">
                        <?php makani_number_options( 'bathrooms', __( 'الحمام ', 'makani' ) ) ?>
                  </select>
             </div>
           </div>    
		<?php break;  ?>
            
          
       <?php }  } ?> 
      </div><!-- .form-group -->
    </div>   
   </form><!-- .advance-search-form -->
   <?php } ?>

   </div>
 </div>
</div>