<?php

namespace Dynamic\Locations\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\MultiLinkField;
use SilverStripe\Versioned\Versioned;

/**
 * Class \Dynamic\Elements\Locations\Model\Location
 *
 * @property string $Title
 * @property string $Content
 * @method DataList|Link[] Links()
 * @method ManyManyList|LocationCategory[] Categories()
 */
class Location extends DataObject
{
    /**
     * @var string
     * @config
     */
    private static string $table_name = 'Location';

    /**
     * @var string
     * @config
     */
    private static string $singular_name = 'Location';

    /**
     * @var string
     * @config
     */
    private static string $plural_name = 'Locations';

    /**
     * @var string
     * @config
     */
    private static string $description = 'A Location DataObject for use with the Locations Element';

    /**
     * @var array
     * @config
     */
    private static array $db = [
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     * @config
     */
    private static array $has_many = [
        'Links' => Link::class . '.Owner',
    ];

    /**
     * @var array
     * @config
     */
    private static array $many_many = [
        'Categories' => LocationCategory::class,
    ];

    /**
     * @var array
     * @config
     */
    private static array $owns = [
        'Links',
    ];

    /**
     * @var array
     * @config
     */
    private static array $extensions = [
        Versioned::class,
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields(): FieldList
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName(['Links']);

            $fields->addFieldsToTab(
                'Root.Main',
                [
                    MultiLinkField::create('Links'),
                ]
            );
        });

        return parent::getCMSFields();
    }
}
