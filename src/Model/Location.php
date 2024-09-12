<?php

namespace Dynamic\Locations\Model;

use Dynamic\SilverStripeGeocoder\AddressDataExtension;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\MultiLinkField;
use SilverStripe\TagField\TagField;
use SilverStripe\Versioned\Versioned;

/**
 * Class \Dynamic\Elements\Locations\Model\Location
 *
 * @property string $Address
 * @property string $Address2
 * @property string $City
 * @property string $State
 * @property string $PostalCode
 * @property string $Country
 * @property bool $LatLngOverride
 * @property float $Lat
 * @property float $Lng
 * @property int $Version
 * @property string $Title
 * @property string $Content
 * @method DataList|Link[] Links()
 * @method ManyManyList|LocationCategory[] Categories()
 * @mixin Versioned
 * @mixin AddressDataExtension
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
    private static $summary_fields = [
        'Title',
        'FullAddress' => 'Address',
        'CategoryList' => 'Categories',
        'Lat',
        'Lng',
    ];

    /**
     * @var array
     * @config
     */
    private static $searchable_fields = [
        'Title',
        'City',
        'State',
        'PostalCode',
        'Country',
    ];

    /**
     * @var array
     * @config
     */
    private static array $extensions = [
        Versioned::class,
        AddressDataExtension::class,
    ];

    /**
     * create a list of assigned categories
     */
    public function getCategoryList()
    {
        if ($this->Categories()->count()) {
            return implode(', ', $this->Categories()->column('Title'));
        }

        return '';
    }

    /**
     * @param bool $includerelations
     * @return array
     */
    public function fieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations);

        $labels['Title'] = _t(__CLASS__ . '.TitleLabel', 'Title');
        $labels['Content'] = _t(__CLASS__ . '.ContentLabel', 'Description');
        $labels['Links'] = _t(__CLASS__ . '.LinksLabel', 'Links');
        $labels['Categories'] = _t(__CLASS__ . '.CategoriesLabel', 'Categories');

        return $labels;
    }

    /**
     * @return FieldList
     */
    public function getCMSFields(): FieldList
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName([
                'Links',
                'Categories',
            ]);

            $fields->addFieldsToTab(
                'Root.Main',
                [
                    TagField::create('Categories', 'Categories', LocationCategory::get(), $this->Categories()),
                    MultiLinkField::create('Links'),
                ]
            );
        });

        return parent::getCMSFields();
    }
}
