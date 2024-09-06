<?php

namespace Dynamic\Locations\Model;

use SilverStripe\ORM\DataObject;

/**
 * Class \Dynamic\Elements\Locations\Model\LocationCategory
 *
 * @property string $Title
 * @method ManyManyList|Location[] Locations()
 */
class LocationCategory extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static string $table_name = 'LocationCategory';

    /**
     * @var string
     * @config
     */
    private static string $singular_name = 'Category';

    /**
     * @var string
     * @config
     */
    private static string $plural_name = 'Categories';

    /**
     * @var string
     * @config
     */
    private static string $description = 'A category to use with Location records';

    /**
     * @var array
     * @config
     */
    private static array $db = [
        'Title' => 'Varchar(255)',
    ];

    /**
     * @var array
     * @config
     */
    private static array $belongs_many_many = [
        'Locations' => Location::class,
    ];

    /**
     * @param bool $includerelations
     * @return array
     */
    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);

        $labels['Title'] = _t(__CLASS__ . '.TitleLabel', 'Title');

        return $labels;
    }
}
