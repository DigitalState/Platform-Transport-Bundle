<?php

namespace Ds\Bundle\TransportBundle\Migrations\Schema\v1_1;

use Oro\Bundle\MigrationBundle\Migration\Migration;
use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * Class DsTransportBundle
 */
class DsTransportBundle implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $this->createTransportWebhookTable($schema);
    }

    /**
     * Create transport Webhook table
     *
     * @param \Doctrine\DBAL\Schema\Schema $schema
     */
    protected function createTransportWebhookTable(Schema $schema)
    {
        $table = $schema->createTable('ds_transport_webhook_data');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('organization_id', 'integer', ['notnull' => false]);
        $table->addColumn('business_unit_owner_id', 'integer', ['notnull' => false]);
        $table->addColumn('created_at', 'datetime', []);
        $table->addColumn('updated_at', 'datetime', []);
        $table->addColumn('processed', 'boolean');
        $table->addColumn('profile_id', 'integer', ['notnull' => true]);
        $table->addColumn('data', 'json_array', ['comment' => '(DC2Type:json_array)']);


        $table->setPrimaryKey(['id']);
        $table->addIndex(['business_unit_owner_id'], 'IDX_BAB22BA759294170', []);
        $table->addIndex(['organization_id'], 'IDX_BAB22BA732C8A3DE', []);
        $table->addIndex(['profile_id'], 'IDX_BAB22BA7CCFA12B8', []);


        $table->addForeignKeyConstraint(
            $schema->getTable('ds_transport_profile'),
            ['profile_id'],
            ['id']
        );

        $table->addForeignKeyConstraint(
            $schema->getTable('oro_business_unit'),
            ['business_unit_owner_id'],
            ['id']
        );

        $table->addForeignKeyConstraint(
            $schema->getTable('oro_organization'),
            ['organization_id'],
            ['id']
        );

    }

}
