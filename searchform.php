<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="d-flex align-center justify-space-between">
        <div class="d-flex align-center">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M14.6725 14.6412L19 19M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="#9C9C9C" stroke-width="1.50477" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <input type="text" class="search-field" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>" />
        </div>
        <span class="c-pointer close-search-js">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M1 12L11.9998 1.00023" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.9998 11.9999L1 1.00012" stroke="#929292" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
    </div>
</form>