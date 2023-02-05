<?php

function display_control_panel() {
  require_once("control-panel/main.php");
  }
  function create_admin_menu() {
    add_menu_page(
          'Control Panel',// page title
          'Control Panel',// menu title
          'manage_options',// capability
          'control_panel',// menu slug
          'display_control_panel' // callback function
      );
  }
  add_action('admin_menu', 'create_admin_menu');