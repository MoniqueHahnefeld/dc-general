<?php
/**
 * PHP version 5
 * @package    generalDriver
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

namespace DcGeneral\DataDefinition\Section\View\Panel;

class DefaultSearchElementInformation implements SearchElementInformationInterface
{
	protected $properties;

	/**
	 * {@inheritDoc}
	 */
	public function getName()
	{
		return 'search';
	}

	/**
	 * {@inheritDoc}
	 */
	public function addProperty($propertyName)
	{
		$this->properties[] = $propertyName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPropertyNames()
	{
		return $this->properties;
	}
}
