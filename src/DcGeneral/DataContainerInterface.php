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

namespace DcGeneral;

/**
 * This interface describes an object providing access to an environment.
 *
 * @package DcGeneral
 */
interface DataContainerInterface extends \editable, \listable
{
	/**
	 * Return the Environment for the DC.
	 *
	 * @return EnvironmentInterface
	 */
	public function getEnvironment();
}