<?php

/**
 * Database query builder core, named Blueprint
 *
 * PHP version 7.4
 *
 * @category Database
 * @package  Chaospelt\Kernel\Database
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */

namespace Chaospelt\Kernel\Database;

use Chaospelt\Kernel\Support\Vivid;
use Chaospelt\Kernel\Database\ColumnDefinition;

/**
 * Database query builder core, named Blueprint
 *
 * @category Database
 * @package  Chaospelt\Kernel\Database
 *
 * @author  Stf Kolev <inkyzfx@gmail.com>
 * @license BSD-3-Clause https://opensource.org/licenses/BSD-3-Clause
 *
 * @link https://github.com/stfkolev/chaospelt
 */
class Blueprint
{
    /**
     * The table the blueprint describes.
     *
     * @var string
     */
    protected $table;

    /**
     * The prefix of the table.
     *
     * @var string
     */
    protected $prefix;

    /**
     * The columns that should be added to the table.
     *
     * @var \Chaospelt\Kernel\Database\ColumnDefinition[]
     */
    protected $columns = [];

    /**
     * The commands that should be run for the table.
     *
     * @var \Chaospelt\Kernel\Support\Fluent[]
     */
    protected $commands = [];

    /**
     * The storage engine that should be used for the table.
     *
     * @var string
     */
    public $engine;

    /**
     * The default character set that should be used for the table.
     *
     * @var string
     */
    public $charset;

    /**
     * The collation that should be used for the table.
     *
     * @var string
     */
    public $collation;

    /**
     * Whether to make the table temporary.
     *
     * @var bool
     */
    public $temporary = false;

    /**
     * The column to add new columns after.
     *
     * @var string
     */
    public $after;

    /**
     * Create a new schema blueprint.
     *
     * @param string        $table    
     * @param \Closure|null $callback 
     * @param string        $prefix  
     *  
     * @return void
     */
    public function __construct($table, Closure $callback = null, $prefix = '')
    {
        $this->table = $table;
        $this->prefix = $prefix;

        if (! is_null($callback)) {
            $callback($this);
        }
    }

    /**
     * Create a new string column on the table.
     *
     * @param string   $column 
     * @param int|null $length 
     * 
     * @return \Chaospelt\Kernel\Database\ColumnDefinition
     */
    public function string($column, $length = null)
    {
        $length = $length ?: \Chaospelt\Helpers\Schema::$defaultStringLength;

        return $this->addColumn('string', $column, compact('length'));
    }


    /**
     * Add a new column to the blueprint.
     *
     * @param string $type       Column Type
     * @param string $name       Column Name
     * @param array  $parameters Column Parameters List
     * 
     * @return \Chaospelt\Kernel\Database\ColumnDefinition
     */
    public function addColumn($type, $name, array $parameters = [])
    {
        return $this->addColumnDefinition(
            new ColumnDefinition(
                array_merge(compact('type', 'name'), $parameters)
            )
        );
    }

    /**
     * Add a new column definition to the blueprint.
     *
     * @param \Chaospelt\Kernel\Database\ColumnDefinition $definition 
     * 
     * @return \Chaospelt\Kernel\Database\ColumnDefinition
     */
    protected function addColumnDefinition($definition)
    {
        $this->columns[] = $definition;

        if ($this->after) {
            $definition->after($this->after);

            $this->after = $definition->name;
        }

        return $definition;
    }

    /**
     * Get the columns on the blueprint.
     *
     * @return \Chaospelt\Kernel\Database\ColumnDefinition[]
     */
    public function getColumns()
    {
        return $this->columns;
    }
}