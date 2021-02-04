<?php // Search Form
$value = is_search() ? get_search_query() : ''; ?>

<div class="search-form">
  <form 
  role   = "search"
  method = "get"
  action = "<?= home_url(); ?>"
  >
    <input 
    type        = "text"
    value       = "<?= $value; ?>"
    placeholder = "Search..."
    aria-label  = "Enter search term"
    >
    <button type="submit" class="search-button">Search</button>
  </form>
</div>
