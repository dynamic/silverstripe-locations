<?php

namespace Dynamic\Elements\Locations\Admin;

use SilverStripe\Admin\ModelAdmin;
use Dynamic\Locations\Model\Location;
use Dynamic\Locations\Model\LocationCategory;

/**
 * Class \Dynamic\Elements\Locations\Admin\LocationsAdmin
 *
 */
class LocationsAdmin extends ModelAdmin
{
    /**
     * @var array
     * @config
     */
    private static array $managed_models = [
        Location::class,
        LocationCategory::class,
    ];

    /**
     * @var string
     * @config
     */
    private static string $menu_title = 'Locations';

    /**
     * @var string
     * @config
     */
    private static string $url_segment = 'locations';
}
