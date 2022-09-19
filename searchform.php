<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="hidden" name="type" value="post" />
    <input type="hidden" name="type" value="product" />
    <div class="catalog-search-wrap">
        <input type="search" name="s" class="rs-form catalog-search-inp" placeholder="Search for products, brands, categories" />
        <img class="catalog-search-icon" src="<?php echo ASSETS . '/images/search-ic.svg'; ?>" alt="" />
    </div>
</form>