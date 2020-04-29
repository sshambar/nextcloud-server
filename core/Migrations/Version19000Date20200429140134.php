<?php

declare(strict_types=1);

namespace OC\Core\Migrations;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;

class Version19000Date20200429140134 extends SimpleMigrationStep {
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if ($schema->hasTable('oc_properties')) {
			$table = $schema->getTable('oc_properties');
			$table->addIndex(['userid', 'propertypath'], 'properties_path_index');
		}
		return $schema;
	}
}
