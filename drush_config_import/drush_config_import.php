<?php

/**
 * This example performs an import of configuration via drush.
 *
 * https://drushcommands.com/drush-8x/config/config-import/
 */

// OPTIONAL - An arbitrary directory that holds the configuration such as a key in $config_directories array in settings.php.
// Defaults to 'sync'.
$config_source = null;
$config_source_label = '';
if ($config_source_label) {
  $config_source = '--source' . $config_source_label;
}

// OPTIONAL - A list of modules to ignore during import
// (e.g. to avoid disabling dev-only modules that are not enabled in the imported configuration).
$skip_modules = null.
$modules_to_skip = 'fcps_site gesso search_api';
if ($modules_to_skip) {
  $skip_modules = '--skip-modules' . $modules_to_skip;
}

// OPTIONAL - Allow for partial config imports from the source directory.
// Only updates and new configs will be processed with this flag (missing configs will not be deleted).
$partial = null;
$run_partial = true; // set to true of this is a partial import of configuration
if ($run_partial) {
  $partial = '--partial';
}

// Use passthru() to run the drush command so the command output prints to the workflow log.
echo "Importing configuration from yml files...\n";
passthru('drush config-import -y' . $partial . $config_source . $skip_modules);
echo "Import of configuration complete.\n";
