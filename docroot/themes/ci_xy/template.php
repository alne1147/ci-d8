<?php
/**
* Override or insert variables into the page template.
*/
function ci_xy_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}

/**
* Override or insert variables into the page template for HTML output.
*/
function ci_xy_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}