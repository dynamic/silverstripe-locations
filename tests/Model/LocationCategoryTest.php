<?php

namespace Dynamic\Locations\Test;

use SilverStripe\Forms\FieldList;
use SilverStripe\Dev\SapphireTest;
use Dynamic\Locations\Model\LocationCategory;

class LocationCategoryTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'location-category.yml';

    /**
     * Test the CMS Fields
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(LocationCategory::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
