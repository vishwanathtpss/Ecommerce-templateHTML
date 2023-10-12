
{script src="js/tygh/exceptions.js"}
{hook name="products:view_main_info"} 
{*$product|fn_print_r *} 
{*if $product.product_options.30.variants=color}
{'color is avalable'}
{/if*}
 {*{assign var="NewVariable" value="$product.product_options.30"}
{$NewVariable} short-hand *}
{/hook} 
    <div class="page-wrapper">
      {hook name="products:view_main_info"}
      {*
       
        {assign var="prod_opts" value=$product.product_id|fn_get_product_options}
        {foreach from=$prod_opts item="product_options" name="opt"}
            $product_options.variants|fn_print_r
            {foreach from="$product_options.variants" item="product_optionss" key=key}
                $option_data = fn_get_product_option_data($key, $product_id);
                {$option_data|fn_print_r}
                <p class="optionsssss">{$product_optionss|fn_print_r}</p>
            {/foreach}
        {/foreach}
        *}
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container-fluid d-flex align-items-center">
                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>
                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container-fluid -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="product-details-top">
                                <div class="row">
                                    <div class="col-md-6 col-lg-7">
                                    {assign var="obj_id" value=$product.product_id}
                                      {include file="common/product_data.tpl" product=$product but_role="big" but_text=__("add_to_cart")}
                                        <div class="product-gallery" style="width: {$settings.Thumbnails.product_details_thumbnail_width}px">
                                        {hook name="products:image_wrap"}
                                         {if !$no_images}
                                            <figure class="product-main-image ty-product-block__img cm-reload-{$product.product_id}" data-ca-previewer="true" id="product_images_{$product.product_id}_update">
                                                <span class="product-label label-sale">Sale</span>
                                                {assign var="product_labels" value="product_labels_`$obj_prefix``$obj_id`"}
                                             {$smarty.capture.$product_labels nofilter}
                                               
                                            </figure><!-- End .product-main-image -->
                                                <div id="product-zoom-gallery" class="product-image-gallery max-col-6">
                                                
                                                    {include file="views/products/components/product_images.tpl" product=$product show_detailed_link="Y" image_width=$settings.Thumbnails.product_details_thumbnail_width image_height=$settings.Thumbnails.product_details_thumbnail_height}
                                                </div>
                                        {/if}
                                    {/hook}<!-- End .product-image-gallery -->
                                          </div><!-- End .product-gallery -->
                                         
                                    </div><!-- End .col-lg-7 -->

                                    <div class="col-md-6 col-lg-5">
                                        <div class="product-details">
                                        <!-- End .product-title ---------->
                                            <h1 class="product-title">{$product.product} </h1>

                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <a class="ratings-text" href="#product-accordion" id="review-link">( 2 Reviews )</a>
                                            </div><!-- End .rating-container -->
                                    {*--------------------- price section ---------------------------------*}
                                    
                                      {assign var="form_open" value="form_open_`$obj_id`"}
                                         {$smarty.capture.$form_open nofilter}
                                        {assign var="old_price" value="old_price_`$obj_id`"}
                                        {assign var="price" value="price_`$obj_id`"}
                                        {assign var="clean_price" value="clean_price_`$obj_id`"}
                                        {assign var="list_discount" value="list_discount_`$obj_id`"}
                                        {assign var="discount_label" value="discount_label_`$obj_id`"}
                                            <div class="product-details {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}prices-container {/if}price-wrap">
                                                 {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
                                 <div class="ty-product-bigpicture__prices product-price ">
                                  {if $smarty.capture.$old_price|trim}{$smarty.capture.$old_price nofilter}{/if}
                                 {/if}

                               {hook name="products:main_price"}
                               {if $smarty.capture.$price|trim}
                               <div class="ty-product-block__price-actual product-price">
                                   {$smarty.capture.$price nofilter}
                                  
                                <span class="old-price">${$product.list_price}</span>
                                           
                            </div>
                         {/if}
                    {/hook}

                    {if $smarty.capture.$old_price|trim || $smarty.capture.$clean_price|trim || $smarty.capture.$list_discount|trim}
                            <div class="ty-product-block__price-old">
                                {$smarty.capture.$clean_price nofilter}
                                {$smarty.capture.$list_discount nofilter}

                                {assign var="product_labels" value="product_labels_`$obj_prefix``$obj_id`"}
                                {$smarty.capture.$product_labels nofilter}
                            </div>
                        </div>
                         {/if}
                                          
                                            </div><!-- End .product-price -->
                                        
                                            <div class="product-content">
                                                <p>{$product.meta_description} </p>
                                            </div><!-- End .product-content -->
                      {*........... product options   section start .................. *}
                                 {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}
                               <div class="ty-product-block__option ">
                                  {assign var="product_options" value="product_options_`$obj_id`"}
                                 {$smarty.capture.$product_options nofilter}
                        
                                </div>
                   
                    {*................... product options   section   end ..................*}
                                         

                                            
                   {*............quantity  section start...................................................*}
                    {* 
                    {if $capture_options_vs_qty}{capture name="product_options"}{$smarty.capture.product_options nofilter}{/if}
                    <div class="ty-product-block__field-group">
                        {assign var="product_amount" value="product_amount_`$obj_id`"}
                        {$smarty.capture.$product_amount nofilter}

                        {assign var="qty" value="qty_`$obj_id`"}
                        {$smarty.capture.$qty nofilter}

                        {assign var="min_qty" value="min_qty_`$obj_id`"}
                        {$smarty.capture.$min_qty nofilter}
                    </div>
                    *}
                       {*.........quantity  section start end.............................*}
                                            
                                                
                                                
                                                  {assign var="product_amount" value="product_amount_`$obj_id`"}
                                             {$smarty.capture.$product_amount nofilter}

                                          {assign var="qty" value="qty_`$obj_id`"}
                                            {$smarty.capture.$qty nofilter}

                                              {assign var="min_qty" value="min_qty_`$obj_id`"}
                                                  {$smarty.capture.$min_qty nofilter}
                                               
                                              <!----- End .product-details-quantity -------------------------->
                                          


                  {*  <div class="product-details-action">
                        if $show_details_button}
                            {include file="buttons/button.tpl" but_href="products.view?product_id=`$product.product_id`" but_text=__("view_details") but_role="submit"}
                        {/if

                        {assign var="add_to_cart" value="add_to_cart_`$obj_id`"}
                        {$smarty.capture.$add_to_cart nofilter}

                        {assign var="list_buttons" value="list_buttons_`$obj_id`"}
                        {$smarty.capture.$list_buttons nofilter}
                    </div>
                    {if $capture_buttons}{/capture}{/if}
                    </div> *}
{*----------------------------------add to cart wish list Add to compare--------------------------------------------------------------*}
                                            <div class="product-details-action">
                                                <a href="#" class="btn-product btn-cart"><span>{include file="buttons/add_to_cart.tpl" but_text=__("add_to_cart") but_name="dispatch[checkout.add..`$obj_id`]"}</span></a>

                                                <div class="details-action-wrapper">
                                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to wishlist{include file="addons/wishlist/views/wishlist/components/add_to_wishlist.tpl" but_id="button_wishlist_`$obj_prefix``$product.product_id`" but_name="dispatch[wishlist.add..`$product.product_id`]" but_role="text"}</span></a>
                                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a>
                                                </div><!-- End .details-action-wrapper -->
                                            </div><!-- End .product-details-action -->
                                        

                                            <div class="product-details-footer">
                                                <div class="product-cat">
                                                    <span>Category:</span>
                                                    <a href="#">Women</a>,
                                                    <a href="#">Dresses</a>,
                                                    <a href="#">Yellow</a>
                                                </div><!-- End .product-cat -->

                                                <div class="social-icons social-icons-sm">
                                                    <span class="social-label">Share:</span>
                                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                                </div>
                                            </div><!-- End .product-details-footer -->

                                            <div class="accordion accordion-plus product-details-accordion" id="product-accordion">
                                                <div class="card card-box card-sm">
                                                    <div class="card-header" id="product-desc-heading">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-desc" aria-expanded="false" aria-controls="product-accordion-desc">
                                                                Description
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="product-accordion-desc" class="collapse" aria-labelledby="product-desc-heading" data-parent="#product-accordion">
                                                        <div class="card-body">
                                                            <div class="product-desc-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>
                                                                <ul>
                                                                    <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                                                    <li>Vivamus finibus vel mauris ut vehicula.</li>
                                                                    <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                                                </ul>

                                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede.</p>
                                                            </div><!-- End .product-desc-content -->
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->

                                                <div class="card card-box card-sm">
                                                    <div class="card-header" id="product-info-heading">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-info" aria-expanded="false" aria-controls="product-accordion-info">
                                                                Additional Information
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="product-accordion-info" class="collapse" aria-labelledby="product-info-heading" data-parent="#product-accordion">
                                                        <div class="card-body">
                                                            <div class="product-desc-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                                                                <h3>Fabric & care</h3>
                                                                <ul>
                                                                    <li>100% Polyester</li>
                                                                    <li>Do not iron</li>
                                                                    <li>Do not wash</li>
                                                                    <li>Do not bleach</li>
                                                                    <li>Do not tumble dry</li>
                                                                    <li>Professional dry clean only</li>
                                                                </ul>

                                                                <h3>Size</h3>
                                                                <p>S, M, L, XL</p>
                                                            </div><!-- End .product-desc-content -->
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->

                                                <div class="card card-box card-sm">
                                                    <div class="card-header" id="product-shipping-heading">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-shipping" aria-expanded="false" aria-controls="product-accordion-shipping">
                                                                Shipping & Returns
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="product-accordion-shipping" class="collapse" aria-labelledby="product-shipping-heading" data-parent="#product-accordion">
                                                        <div class="card-body">
                                                            <div class="product-desc-content">
                                                                <p> <a href="#">Returns information</a></p>
                                                            </div><!-- End .product-desc-content -->
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->

                                                <div class="card card-box card-sm">
                                                    <div class="card-header" id="product-review-heading">
                                                        <h2 class="card-title">
                                                            <a role="button" data-toggle="collapse" href="#product-accordion-review" aria-expanded="true" aria-controls="product-accordion-review">
                                                                Reviews (2)
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="product-accordion-review" class="collapse show" aria-labelledby="product-review-heading" data-parent="#product-accordion">
                                                        <div class="card-body">
                                                            <div class="reviews">
                                                                <div class="review">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-auto">
                                                                            <h4><a href="#">Samanta J.</a></h4>
                                                                            <div class="ratings-container">
                                                                                <div class="ratings">
                                                                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                                                </div><!-- End .ratings -->
                                                                            </div><!-- End .rating-container -->
                                                                            <span class="review-date">6 days ago</span>
                                                                        </div><!-- End .col -->
                                                                        <div class="col">
                                                                            <h4>Good, perfect size</h4>

                                                                            <div class="review-content">
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                                            </div><!-- End .review-content -->

                                                                            <div class="review-action">
                                                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                                            </div><!-- End .review-action -->
                                                                        </div><!-- End .col-auto -->
                                                                    </div><!-- End .row -->
                                                                </div><!-- End .review -->

                                                                <div class="review">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-auto">
                                                                            <h4><a href="#">John Doe</a></h4>
                                                                            <div class="ratings-container">
                                                                                <div class="ratings">
                                                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                                                </div><!-- End .ratings -->
                                                                            </div><!-- End .rating-container -->
                                                                            <span class="review-date">5 days ago</span>
                                                                        </div><!-- End .col -->
                                                                        <div class="col">
                                                                            <h4>Very good</h4>

                                                                            <div class="review-content">
                                                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                                            </div><!-- End .review-content -->

                                                                            <div class="review-action">
                                                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                                            </div><!-- End .review-action -->
                                                                        </div><!-- End .col-auto -->
                                                                    </div><!-- End .row -->
                                                                </div><!-- End .review -->
                                                            </div><!-- End .reviews -->
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->
                                            </div><!-- End .accordion -->
                                        </div><!-- End .product-details -->
                                    </div><!-- End .col-lg-5 -->
                                </div><!-- End .row -->
                            </div><!-- End .product-details-top -->
                        </div><!-- End .col-xl-10 -->
                    </div><!-- End .row -->

                </div><!-- End .container-fluid -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

          {/hook}  
    </div><!-- End .page-wrapper -->
